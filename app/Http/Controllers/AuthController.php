<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }  
      
    public function customLogin(Request $request)
    {
		$rules = [
            'email'                 => 'required|string',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'email.required'        => 'Nama wajib diisi',
            'email.string'           => 'Nama tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
		
		$validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
		
		$data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);
		
		if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
			if(Auth::user()->usertype == 'admin'){
            return redirect('/dashboard');
			}else if(Auth::user()->usertype == 'mhs'){
			return redirect('/dashboard2');	
			}
			
  
        } else { // false
  
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
		
        // if(Auth::attempt($request->only('email','password'))){
        //    return redirect('/dashboard');
		//}
    return redirect('login');
    }
    public function registration()
    {
        //return view('auth.registration');
		return view('admin.register');
    }
      
    public function customRegistration(Request $request)
    {  
        //$request->validate([
        //    'name' => 'required',
        //    'email' => 'required|email|unique:users',
        //    'password' => 'required|min:6',
        //]);
           
        //$data = $request->all();
        //$check = $this->create($data);
         
        //return redirect("dashboard")->withSuccess('You have signed-in');
		//$in_vocer = $data['vocer'];
       // $arrayvocer = explode('0', $in_vocer);
        //$id_jalurendaftaran = ($arrayvocer[2]);
        //$id_jalurmasuk = ($arrayvocer[3]);
        // dd($id_jalurmasuk);

        //buat username
        //$in_nama = $data['name'];
        //$arraynama = explode(' ', $in_nama);
        //$usernamebaru = ($arraynama[0]);

        // dd($usernamebaru);

        //buat usertype
        $role = 'admin';

        //buat noregis
        //$tahun = date('Y');
        //$idterakhir = User::latest()->first()->id;
        //$tambah = $idterakhir + 1;
        //$idbaru = $tahun . '00' . $tambah;


        // username fix
       //$usernameinput = $usernamebaru . '00' . $tambah;

        //kirim email
        // $name  =  $data['name'];
        //$email = $data['email'];
        //$data2 = array(
        //    'name' => $data['name'],
        //    'email' => $data['email'],
        //    'password' => $usernameinput,

        //);
        //Mail::send('email_template', $data2, function ($mail) use ($email) {
        //    $mail->to($email, 'no-replay')
        //        ->subject("Akun Pmb");
        //    $mail->from('pmb@polimersia.ac.id', 'Panitia PMB');
        //});
		$usernameinput=$request->password;


        User::create([
            'nama_calon_mahasiswa' => $request->nama_mhs,
            'usertype' => $role,
            'email' => $request->email,
            'password' => Hash::make($usernameinput),
            
        ]);
		
		 return redirect('login');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}