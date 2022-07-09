<?php

namespace App\Http\Controllers;

use App\Models\Translate;
use Illuminate\Http\Request;
use App\Models\File;

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
        $audioFile = \Illuminate\Support\Facades\Storage::path('public/files/extra_0a.wav');
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
            foreach ($recognize->getResults() as $result) {
                $alternatives = $result->getAlternatives();
                $mostLikely = $alternatives[0];
                $transcript[] = $mostLikely->getTranscript();
            }

            $transcript = implode(" ", $transcript);

            $data = [
                'file_id' => $request->id,
                'text' => $transcript
            ];
//            Translate::create($data);sc
            return redirect()->back()->with(['message' => $transcript]);

        } catch (\Google\ApiCore\ApiException $exception) {
            return redirect()->back()->with(['exception' => $exception]);
        } finally {
            $client->close();
        }
    }




}
