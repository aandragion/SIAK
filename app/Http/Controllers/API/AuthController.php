<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{


	public function register(Request $request)
	{

     //buat username
		//$in_nama = $data['nama_calon_mahasiswa'];
		//$arraynama = explode(' ', $in_nama);
		//$usernamebaru = ($arraynama[0]);
     //buat usertype
		//$role = 'user';

     //buat noregis
		$tahun = date('Y');
		$idterakhir = User::latest()->first()->id;
		$tambah = $idterakhir + 1;
		$idbaru = $tahun . '00' . $tambah;

	 	// username fix
		//$usernameinput = $usernamebaru . '00' . $tambah;

     	//kirim email
        // $name  =  $data['name'];


		$validator = Validator::make($request->all(),[
			'id_programstudi' => 'required|string',
			'id_jalurpendaftaran' => 'required|string',
			'id_jalurmasuk' => 'required|string',
			'nama_calon_mahasiswa' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'no_hp' => 'required|string|max:255',
			'asal_sekolah' => 'required|string|max:255',
			// 'password' => 'required|string',
			// 'no_registrasi' => "required|string|max:255",
			'usertype' => 'required|string|max:255'
		]);

		if($validator->fails()){
			return response()->json($validator->errors());       
		}
		
		$email = $request->email;
		$data2 = array(
			'name' =>  $request->nama_calon_mahasiswa,
			'email' => $request->email,
			'password' => $request->asal_sekolah,

		);

		Mail::send('email_template', $data2, function ($mail) use ($email) {
			$mail->to($email, 'no-replay')
			->subject("Akun Pmb POLIMERCIA");
			$mail->from('pmb@polimercia.ac.id', 'Panitia PMB');
		});
		$user = User::create([
			'id_programstudi' => $request->id_programstudi,
			'id_jalurpendaftaran' => $request->id_jalurpendaftaran,
			'id_jalurmasuk' => $request->id_jalurmasuk,
			'nama_calon_mahasiswa' => $request->nama_calon_mahasiswa,
			'email' => $request->email,
			'no_hp' => $request->no_hp,
			'no_registrasi' => $idbaru,
			'usertype' => $request->usertype,
			'asal_sekolah' => $request->asal_sekolah,
			'password' => Hash::make($request->asal_sekolah)
		]);

		$token = $user->createToken('auth_token')->plainTextToken;

		return response()
		->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
	}

	public function login(Request $request)
	{
		if (!Auth::attempt($request->only('email', 'password')))
		{
			return response()
			->json(['message' => 'Unauthorized'], 401);
		}

		$user = User::where('email', $request['email'])->firstOrFail();

		$token = $user->createToken('auth_token')->plainTextToken;

		return response()
		->json(['message' => 'Hi '.$user->nama_calon_mahasiswa.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', 'role'=>$user->usertype, 'id_user'=>$user->id]);
	}

    // method for user logout and delete token
	public function logout()
	{
		auth()->user()->tokens()->delete();

		return [
			'message' => 'You have successfully logged out and the token was successfully deleted'
		];
	}

	
}
