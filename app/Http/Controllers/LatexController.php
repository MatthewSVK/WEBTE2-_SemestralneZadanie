<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LatexController extends Controller
{
    public function parse(){
        // TUTO SI MOZETE SPRAVIT DUMP DIE DEBUG A POZRIET SI AKO TO JE ROZPARSOVANE
        // FUNGUJE TO NA OBE TYPY FILOV
        // PRE UPLOAD noveho latexu dat do poznamky nech \includegraphics obsahuje iba meno filu a nie path
        //ddd($this->parseLatex(Storage::disk('latex')->get('blokovka01pr.tex')));
        return view('dashboard', [
            "latex" => $this->parseLatex(Storage::disk('latex')->get('odozva01pr.tex')),
        ]);
    }

    public function parseLatex(string $texContent){
        $result = [];
        $lines = preg_split('/\R/', $texContent);
        
        $currentSection = null;
        $captureTask = false;
        $captureSolution = false;

        foreach($lines as $line){
            if(preg_match('/\\\\section\*{([^}]*)}/', $line, $matches)){
                $captureTask = false;
                $captureSolution = false;
                $currentSection = [
                    'ID' => $matches[1],
                    'image' => "",
                    'task' => "",
                    "solution" => "",
                ];
            }elseif(preg_match('/\\\\end{(solution*)}/', $line)){
                $result[] = $currentSection;
            }elseif(preg_match('/\\\\begin{(task*)}/', $line)){
                $captureTask = true;
            }elseif(preg_match('/\\\\end{(task*)}/', $line)){
                $captureTask = false;
            }elseif(preg_match('/\\\\begin{(equation\*)}/', $line)){
                if($captureTask == true){
                    continue;
                }else{
                    $captureSolution = true;
                }
            }elseif(preg_match('/\\\\end{(equation\*)}/', $line)){
                if($captureTask == true){
                    continue;
                }else{
                    $captureSolution = false;
                }
            }elseif (!empty(trim($line))) {
                if ($currentSection) {
                    if($captureTask == true){
                        if(preg_match('/\\\\includegraphics{([^}]*)}/', $line, $match)){
                            $currentSection['image'] = $match[1];
                        }else{
                            $currentSection['task'] .= trim($line). "\n";
                        }
                    } elseif($captureSolution == true){
                        $currentSection['solution'] .= trim($line)."\n";
                    }
                }
            }
        }
        unset($currentSection);
        unset($currentSubsection);

        return $result;
    }

}
