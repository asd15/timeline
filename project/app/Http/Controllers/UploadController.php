<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    public function index(){
        //$uploads = Upload::groupBy('year')->orderBy('year', 'DESC')->get();


        $uploads = DB::table('uploads')->select('year')->orderBy('year', 'ASC')
            ->groupBy('year')->get();

        $images = DB::table('uploads')->select('image', 'year')->get();

        //dd($images);
        //$uploads = $u->unique('year');
        //dd($uploads);
        //dd($query);
        return view('welcome', ['uploads'=>$uploads, 'images'=>$images]);
    }

    public function show(){
        $uploads = Upload::all();
        return view('upload', ['uploads'=>$uploads]);
    }

    public function store(Request $req){
        //$path = $req->file('img')->store('images');
        //$details = ImageManagerStatic::make($path)->exif('FileDateTime');
        //$year = Carbon::createFromTimestamp($details)->format('Y');
        //$month = Carbon::createFromTimestamp($details)->format('m');

        $path = $req->file('img')->store('images');
        $year = Carbon::createFromDate(request('photodate'))->year;
        $month = Carbon::createFromDate(request('photodate'))->month;
        $imgdate = Carbon::createFromDate(request('photodate'))->format('d/m/Y');

        $upload = new Upload();

        $upload->image = $path;
        $upload->month = $month;
        $upload->year = $year;
        $upload->imgdate = $imgdate;
        $upload->save();


        return redirect("/");
        //$img = ImageManagerStatic::make($req->file('img')->getRealPath());

        //return redirect("/upload")->with('msg', 'Image uploaded successfully');
        //return ['details'=>$d, 'upload'=>'success'];
    }
}
