<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $menus=Menu::paginate(3);

        return view ('menu',[
            'kategoris'=>$kategoris,
            'menus'=>$menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'pelanggan'=>'required',
            'alamat'=>'required',
            'telp'=>'required',
            'jeniskelamin'=>'required',
            'email'=>'required | email |unique:pelanggans',
            'password'=>'required |min:3',
        ]);
        Pelanggan::create([
            'pelanggan'=>$data['pelanggan'],
            'jeniskelamin'=>$data['jeniskelamin'],
            'alamat'=>$data['alamat'],
            'telp'=>$data['telp'],
            'email'=>$data['email'],
            'password'=> Hash::make($data['password'])
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategoris=Kategori::all();
        $menus=Menu::where('idkategori',$id)->paginate();
        return view('kategori',[
            'kategoris'=>$kategoris,
            'menus'=>$menus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function register(){
        $kategoris=Kategori::all();
        return view ('register',['kategoris'=>$kategoris]);
    }

    public function login(){
        $kategoris=Kategori::all();
        return view('login',['kategoris'=>$kategoris]);
    }

    public function postlogin(Request $request){
        $data = $request->validate([
            'email'=>'required',
            'password'=>'required|min:3',
        ]);
        $pelanggan = Pelanggan::where('email',$data)->first();

        if($pelanggan){
            if (Hash::check($data['password'],$pelanggan['password'])) {
                $data=[
                    'idpelanggan'=>$pelanggan['id'],
                    'email'=>$pelanggan['email'],
                ];

                $request->session()->put('idpelanggan',$data);
                return redirect('/');
            } else {
                return back()->with('pesan','Password Salah');
            }

        }
        else{
            return back()->with('pesan','email belum terdaftar');
        }
    }
    public function logout(){
        session()->flush();
        return redirect('/');
    }

    /**
     * Display the home page.
     */
    public function home()
    {
        $kategoris = Kategori::all();
        $menus = Menu::take(6)->get(); // Show featured products

        return view('home', [
            'kategoris' => $kategoris,
            'menus' => $menus
        ]);
    }

    /**
     * Display the menu page.
     */
    public function menu()
    {
        $kategoris = Kategori::all();
        $menus = Menu::paginate(12);

        return view('menu', [
            'kategoris' => $kategoris,
            'menus' => $menus
        ]);
    }

    /**
     * Display the contact page.
     */
    public function kontak()
    {
        $kategoris = Kategori::all();

        return view('kontak', [
            'kategoris' => $kategoris
        ]);
    }
}
