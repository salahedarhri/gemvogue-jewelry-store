<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bijou;

class ShopController extends Controller
{
    //Je vais les regrouper tous dans une seule fonction

        //Catégorie
        public function sortCategory(Request $request){
                
            if($request ->has('typeBijou')){
                $typeBijou = $request->typeBijou;

                $bijoux = Bijou::where('type', $typeBijou)
                ->paginate(24);

                return view('shop',compact('bijoux','typeBijou'));
            }

            return redirect()->back();
        }

         //Prix : selection + entrer fourchette 
         public function sortPrix(Request $request){
                if($request->has('prixRange')){
                $prixRange = $request->prixRange;

                switch ($prixRange) {
                    case '0-500':
                        $bijoux = Bijou::where('prix', '<=', 500)->where('prix', '>=', 0)->orderBy('prix','asc');
                        break;
                    case '500-1000':
                        $bijoux = Bijou::where('prix', '<=', 1000)->where('prix', '>=', 500)->orderBy('prix','asc');
                        break;
                    case '1000-1500':
                        $bijoux = Bijou::where('prix', '<=', 1500)->where('prix', '>=', 1000)->orderBy('prix','asc');
                        break;
                    case '1500-2000':
                        $bijoux = Bijou::where('prix', '<=', 2000)->where('prix', '>=', 1500)->orderBy('prix','asc');
                        break;
                    case '2000+':
                        $bijoux = Bijou::where('prix', '>=', 2000)->orderBy('prix','asc');
                        break;
                    default:
                        return redirect()->back();
                }

                $bijoux = $bijoux->paginate(12);
        
                return view('shop', compact('bijoux', 'prixRange'));
            }
            return redirect()->back();
        }
        

        public function sortPrixRange(Request $request){

            $prixMin = $request->input('prixMin');
            $prixMax = $request->input('prixMax');
        
            if ($prixMin && $prixMax) {
                $bijoux = Bijou::where('prix', '>=', $prixMin)
                               ->where('prix', '<=', $prixMax)
                               ->orderBy('prix','asc')
                               ->paginate(12);
                return view('shop', compact('bijoux', 'prixMin', 'prixMax'));
                
            } elseif ($prixMin) {
                $bijoux = Bijou::where('prix', '>=', $prixMin)
                                ->orderBy('prix','asc')
                               ->paginate(12);
                return view('shop', compact('bijoux', 'prixMin'));
                
            } elseif ($prixMax) {
                $bijoux = Bijou::where('prix', '<=', $prixMax)
                                ->orderBy('prix','asc')
                                ->paginate(12);
                return view('shop', compact('bijoux', 'prixMax'));
                
            }
        
            return redirect()->back();
        }
        
        //Appends
}
