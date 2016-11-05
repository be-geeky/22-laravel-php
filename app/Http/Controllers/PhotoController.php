<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;
use App\UploadedFile;
use App\Exp;
use App\Image;
use App\JoinExpImage;
use App\JoinUserExp;
use App\Http\Requests;

use \Storage;
use File;
use DB;
use Carbon\Carbon;


class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Exp $exp)
    {
        var_dump($exp->id);
        $exps = Exp::all();
        // $users = JoinUserExp::all();
        $users = JoinUserExp::where('id_user', $exp->id)->get();
        //je selectionne seulement les Id des images correspondant a l'exp
        $joins = JoinExpImage::where('exp_id', $exp->id)->Where('delete', '!=', '1')->get();
        // $joins = JoinExpImage::all();

        //on recupere seulement les images de l'exp
        // $images = Image::all();


    // @foreach($joins as $join)
    // @if($exp->id == $join->exp_id)
    // @foreach($images as $image)
    // @if($image->id == $join->image_id)

        // $images = DB::table('images')
        //             ->where($joins), 'id', '=', $exp->id)
        //             ->get();


        // $users = DB::table('users')
        //         ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //         ->join('orders', 'users.id', '=', 'orders.user_id')
        //         ->select('users.*', 'contacts.phone', 'orders.price')
        //         ->get();


        // return view('exps.photos.index', compact(
        //     'exps', 'users', 'images', 'joins', 'exp'));
        return view('exps.photos.index', compact(
            'exps', 'users', 'joins', 'exp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Exp $exp)
    {
        var_dump($exp->id);
        return view('exps.photos.create', compact('exp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Exp $exp, Request $request)
    {
        var_dump($exp->id);
        //on verifie qu'il s'agit bien d'une image envoyée
        if(isset($_FILES['file']))
        {
            $file = $_FILES['file'];
            //vérification qu'il s'agit d'une image
            if (getimagesize($file['tmp_name']))
            {
                echo "c'est bien une image";
                //on créé le dossier image s'il n'existe pas
                if (!file_exists(public_path('img/'))) {
                File::makeDirectory(public_path('img/'));
                echo "Creation ";
                }
                echo "dossier img | ";
                //on créé le dossier de l'exp s'il n'existe pas
                if (!file_exists(public_path('img/'.$exp->id))) {
                File::makeDirectory(public_path('img/'.$exp->id));
                echo "Creation ";
                }
                echo "sous dossier img " . $exp->id;
                //on injecte l'image dans ce dossier
                if (Input::hasFile('file')) {
                    $file = Input::file('file');
                    //clone de la photo
                    $copie_file = clone $file;
                   // imagepng(imagecreatefromstring(file_get_contents($copie_file)), "output.PNG");

                    //insérer le nom de la photo dans la table image
                    // $name = $file->getClientOriginalName();
                    // var_dump($name);

                    // die;
                    //il faut insérer le nom de la photo dans la table Photo,
                    //Aussi, il faut transformer les images en $id.JPG
                    $nouvel = Image::create([
                        'description' => $file->getClientOriginalName(),
                        ]);
                    // il faut aussi associer la jointure avec l'id, OK !!
                    $join = JoinExpImage::create([
                        'exp_id' => $exp->id,
                        'image_id' => $nouvel->id
                    ]);

                    // $nouvel->update(['name' => $nouvel->id.'.'.$file->getClientOriginalExtension()]);
                    $nouvel->update(['name' => $nouvel->id.'.PNG',
                        'option_1' => $nouvel->id.'_mini.PNG'
                        ]);

                    //$file->move('img/'.$exp->id, $nouvel->id.'.'.$file->getClientOriginalExtension());//prend le dernier l'extension du fichier image
                    // echo '<img src="img/'.$exp->id.'/'. $nouvel->id.'.'.$file->getClientOriginalExtension().'"/>';

                    $file->move('img/'.$exp->id, $nouvel->name);//prend le dernier l'extension du fichier image
                    // $png->move('img/'.$exp->id, $nouvel->option_1);//prend le dernier l'extension du fichier image

                    echo '<img src="/img/'.$exp->id.'/'. $nouvel->name.'"/>';
                    // die();
                    echo "<BRr>il y a un fichier";
                }
            }
            else
            {
               return redirect()->route('exp.photo.index', [$exp])->with('message', 'erreur de photo !');
            }
        }
        else
               return redirect()->route('exp.photo.index', [$exp])->with('message', 'erreur de photo !');
        return redirect()->route('exp.photo.index', [$exp])->with('message', 'nouvelle photo ajoutée !');
    }


    // public function store(Exp $exp, Request $request)
    // {
    //     var_dump($exp->id);
    //     //on créé le dossier image s'il n'existe pas
    //     if (!file_exists(public_path('img/'))) {
    //     File::makeDirectory(public_path('img/'));
    //     echo "Creation ";
    //     }
    //     echo "dossier img | ";
    //     //on créé le dossier de l'exp s'il n'existe pas
    //     if (!file_exists(public_path('img/'.$exp->id))) {
    //     File::makeDirectory(public_path('img/'.$exp->id));
    //     echo "Creation ";
    //     }
    //     echo "sous dossier img " . $exp->id;
    //     //on injecte l'image dans ce dossier
    //     if (Input::hasFile('file')) {
    //         $file = Input::file('file');
    //         //insérer le nom de la photo dans la table image
    //         $name = $file->getClientOriginalName();
    //         //il faut insérer le nom de la photo dans la table Photo,
    //         //Aussi, il faut transformer les images en $id.JPG
    //         $nouvel = Image::create([
    //             'description' => $file->getClientOriginalName(),
    //             'option_1' => '1',
    //             ]);
    //         // il faut aussi associer la jointure avec l'id, OK !!
    //         $join = JoinExpImage::create([
    //             'exp_id' => $exp->id,
    //             'image_id' => $nouvel->id
    //         ]);

    //         $nouvel->update(['name' => $nouvel->id.'.'.$file->getClientOriginalExtension()]);
    //         var_dump(" | ". $nouvel->name . " | ");

    //         //$file->move('img/'.$exp->id, $nouvel->id.'.'.$file->getClientOriginalExtension());//prend le dernier l'extension du fichier image
    //         // echo '<img src="img/'.$exp->id.'/'. $nouvel->id.'.'.$file->getClientOriginalExtension().'"/>';
    //         $file->move('img/'.$exp->id, $nouvel->name);//prend le dernier l'extension du fichier image

    //         echo '<img src="/img/'.$exp->id.'/'. $nouvel->name.'"/>';
    //         echo "<BRr>il y a un fichier";

    //     }
    //     return redirect()->route('exp.photo.index', [$exp])->with('message', 'nouvelle photo ajoutée !');

    // }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return view('exps.photos.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exp $exp, Image $image)
    {
        return view('exps.images.edit', compact('exp', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Image $image)//possibilité de rajouter une Request pour obliger à remplir un champ
    {
        $image->update($request->all());
        return redirect()->route('exp.images.index')->with('message', 'Image modified !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Exp $exp)
    {
        //on vérifie que l'image supprimer est phpq l"image de couverture
        $cover = Exp::where('photo', $request->image)->get();
        var_dump($cover);
        DB::table('exps')
                  ->where('id', $exp->id)
                  ->where(['photo' => $request->image])
                  ->update(['photo' => '0']);

//on met un indicateur avec la date de suppression pour plus tard
        $joins = JoinExpImage::find($request->image);
        $joins->update([
            'delete' => 1,
            'time_del' => Carbon::now()
        ]);
        $image = Image::find($request->image);
        $image->update([
            'delete' => 1,
            'time_del' => Carbon::now()
        ]);

// $image->delete();--
        return redirect()->route('exp.photo.index', [$exp])->with('message', 'Image deleted !');
    }

}
