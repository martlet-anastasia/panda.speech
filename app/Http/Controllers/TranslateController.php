<?php

namespace App\Http\Controllers;

use App\Models\Translate;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

use Google\Cloud\Speech\V1\RecognitionAudio;
use Google\Cloud\Speech\V1\RecognitionConfig;
use Google\Cloud\Speech\V1\RecognitionConfig\AudioEncoding;
use Google\Cloud\Speech\V1\SpeechClient;

class TranslateController extends Controller
{
    public function configureTranslate($id)
    {
        $file = File::findOrFail($id);
        return view('translate.create', [
            'file' => $file,
        ]);
    }

    protected function runTranslate(Request $request) {

        /** Path to the file name */
        $audioFile = \Illuminate\Support\Facades\Storage::path('public/extra_0a.wav');
        /** Get contents of a file into a string */
        $content = file_get_contents($audioFile);

        /** Config creation */
        $encoding = AudioEncoding::value($request->encoding);
        $sampleRateHertz = (int) $request->sampleRateHertz;
        $languageCode = $request->languageCode;

        /** Set audio content */
        $audio = (new RecognitionAudio())
            ->setContent($content);

        /** Set config */
        $config = (new RecognitionConfig())
            ->setEncoding($encoding)
            ->setSampleRateHertz($sampleRateHertz)
            ->setLanguageCode($languageCode);

        /** Create Speech Client */
        $client = new SpeechClient();
        try {
            $recognize = $client->recognize($config, $audio);
            $transcript = [];
            $score = [];
            foreach ($recognize->getResults() as $result) {
                $alternatives = $result->getAlternatives();
                $mostLikely = $alternatives[0];
                $transcript[] = $mostLikely->getTranscript();
                $score[] = $mostLikely->getConfidence();
            }

            $transcript = implode("\n", $transcript);
            $average_score = round(array_sum($score) / count($score), 2);

            /** Save transcript */
            $pathToSave = '/public/' . auth()->id() . '/translates/audio_' . $request->id . time();
            Storage::put($pathToSave, $transcript);
            $data = [
                'file_id' => $request->id,
                'path' => $pathToSave,
            ];
            Translate::create($data);
            $file = File::findOrFail($request->id);
            $file->translated = 1;
            $file->save();

            return redirect()->back()
                ->with('status', 'success')
                ->with('average_score', $average_score)
                ->with('file_id', $request->id)
                ->with('message', $transcript);

        } catch (\Google\ApiCore\ApiException $exception) {

            return back()
                ->with('status', 'error')
                ->with('error', $exception->getStatus())
            ->with('message', $exception->getBasicMessage());

        } finally {
            $client->close();
        }
    }


    public function showTranslate($id) {
        $translate = File::findOrFail($id)->translate;

        $data = [
            'filename' =>  File::findOrFail($id)->name,
            'fileid' => $id,
            'translated_at' => $translate->updated_at,
            'text' => Storage::get($translate->path)
        ];

        return view('translate.show', [
            'data' => $data,
        ]);
    }


}
