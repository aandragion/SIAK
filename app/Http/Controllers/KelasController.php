<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Models\jurusan;
use App\Models\Kurikulum;
use App\Models\Kmatkul;
use App\Models\Dosen;
use App\Models\Periode;
use App\Models\Matkul;
use App\Models\Ruangan;
class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        //
        $kelas = jurusan::all();
        $kurikulum = Kurikulum::distinct()->orderBy('id_kurikulum','DESC')->get(['nama_kurikulum']);
        $periode = Periode::all();
        $ruangan = Ruangan::all();
        $jadwal = Jadwal::all();
        $matkul = Matkul::all();
		$dosen = Dosen::where('nama_dosen','!=','Belum Diketahui')->get();
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->get();
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->count();
        return view("/admin/Ikelas",compact("kelas","kurikulum","periode","ruangan","matkul","kmatkul",'jmlkmatkul','jadwal','dosen'));
    }
	
	public function index2($title) 
    {
        //
        $kelas = jurusan::all();
        $kurikulum = Kurikulum::distinct()->orderBy('id_kurikulum','DESC')->get(['nama_kurikulum']);
        $periode = Periode::all();
        $ruangan = Ruangan::all();
        $jadwal = Jadwal::all();
        $matkul = Matkul::all();
		$dosen = Dosen::where('nama_dosen','!=','Belum Diketahui')->get();
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$title)->get();
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$title)->count();
        return view("/admin/Ikelas",compact("kelas","kurikulum","periode","jmlkmatkul","ruangan","matkul","kmatkul",'jadwal','dosen'));
    }
	public function index3(Request $request) 
    {
        //
		
		
		
		$jurusan= $request->jurusan;
		$periode1= $request->periode;
		$kurikulum1 = $request->kurikulum;
		$semester = $request->semester;
		
		
        $kelas = jurusan::all();
        $kurikulum = Kurikulum::distinct()->orderBy('id_kurikulum','DESC')->get(['nama_kurikulum']);
        $periode = Periode::all();
        $ruangan = Ruangan::all();
        $jadwal = Jadwal::all();
        $matkul = Matkul::all();
		$dosen = Dosen::where('nama_dosen','!=','Belum Diketahui')->get();
		
		//pilih kosong
		if($jurusan == '' && $periode1 == '' && $semester == '' && $kurikulum1 == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->count();	
		}
		//pilih jurusan saja
		else if($periode1 == '' && $semester == '' && $kurikulum1 == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)->count();
		}
		//pilih periode saja
		else if($jurusan == '' && $semester == '' && $kurikulum1 == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('kurikulum.id_periode',$periode1)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('kurikulum.id_periode',$periode1)->count();
		}
		//pilih semester saja
		else if($jurusan == '' && $periode1 == '' && $kurikulum1 == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('kmatkul.semester',$semester)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('kmatkul.semester',$semester)->count();
		}
		//pilih kurikukulum saja
		else if($jurusan == '' && $periode1 == '' && $semester == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')
		->where('kurikulum.nama_kurikulum',$kurikulum1)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')
		->where('kurikulum.nama_kurikulum',$kurikulum1)->count();
		}
		//pilih kurikulum sama jurusan
		else if($periode1 == '' && $semester == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)
		->where('kurikulum.nama_kurikulum',$kurikulum1)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)
		->where('kurikulum.nama_kurikulum',$kurikulum1)->count();
		}
		//pilih kurikulum sama periode
		else if($jurusan == '' && $semester == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')
		->where('kurikulum.nama_kurikulum',$kurikulum1)->where('kurikulum.id_periode',$periode1)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')
		->where('kurikulum.nama_kurikulum',$kurikulum1)->where('kurikulum.id_periode',$periode1)->count();
		}
		//pilih kurikulum sama semester
		else if($jurusan == '' && $periode1 == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')
		->where('kurikulum.nama_kurikulum',$kurikulum1)->where('kmatkul.semester',$semester)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')
		->where('kurikulum.nama_kurikulum',$kurikulum1)->where('kmatkul.semester',$semester)->count();
		}
		//pilih jurusan sama periode
		else if($kurikulum1 == '' && $semester == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)
		->where('kurikulum.id_periode',$periode1)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)
		->where('kurikulum.id_periode',$periode1)->count();
		}
		//pilih jurusan sama semester
		else if($kurikulum1 == '' && $periode1 == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)
		->where('kmatkul.semester',$semester)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)
		->where('kmatkul.semester',$semester)->count();
		}
		//pilih periode sama semester
		else if($jurusan == '' && $kurikulum1 == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')
		->where('kmatkul.semester',$semester)->where('kurikulum.id_periode',$periode1)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')
		->where('kmatkul.semester',$semester)->where('kurikulum.id_periode',$periode1)->count();
		}
		//pilih jurusan, kurikulum, semester
		else if($periode1 == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)
		->where('kurikulum.nama_kurikulum',$kurikulum1)->where('kmatkul.semester',$semester)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)
		->where('kurikulum.nama_kurikulum',$kurikulum1)->where('kmatkul.semester',$semester)->count();
		}
		//pilih jurusan, kurikukulum, periode
		else if($semester == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)
		->where('kurikulum.nama_kurikulum',$kurikulum1)->where('kurikulum.id_periode',$periode1)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)
		->where('kurikulum.nama_kurikulum',$kurikulum1)->where('kurikulum.id_periode',$periode1)->count();
		}
		//pilih jurusan, periode, semester
		else if($kurikulum1 == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)
		->where('kmatkul.semester',$semester)->where('kurikulum.id_periode',$periode1)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)
		->where('kmatkul.semester',$semester)->where('kurikulum.id_periode',$periode1)->count();
		}
		//pilih kurikulum, periode, semester
		else if($jurusan == ''){
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')
		->where('kurikulum.nama_kurikulum',$kurikulum1)->where('kmatkul.semester',$semester)->where('kurikulum.id_periode',$periode1)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')
		->where('kurikulum.nama_kurikulum',$kurikulum1)->where('kmatkul.semester',$semester)->where('kurikulum.id_periode',$periode1)->count();
		}
		else{
		$kmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)
		->where('kurikulum.nama_kurikulum',$kurikulum1)->where('kmatkul.semester',$semester)->where('kurikulum.id_periode',$periode1)->get();
		
		$jmlkmatkul = Kmatkul::join('matkul','matkul.id_matkul','=','kmatkul.id_matkul')
		->join('kurikulum','kurikulum.id_kurikulum','=','kmatkul.id_kurikulum')
		->join('periode','periode.id_periode','=','kurikulum.id_periode')
		->join('jurusan','jurusan.id_programstudi','=','kurikulum.id_programstudi')
		->select('kmatkul.*','matkul.*','kurikulum.*','periode.*','jurusan.*')->where('jurusan.nama_jurusan',$jurusan)
		->where('kurikulum.nama_kurikulum',$kurikulum1)->where('kmatkul.semester',$semester)->where('kurikulum.id_periode',$periode1)->count();
		}
		
		
		
		 return view("/admin/Ikelas",compact("kelas","kurikulum","periode","ruangan","matkul","kmatkul",'jmlkmatkul','jadwal','dosen'));	
		
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
        //
        //dd($request->all());
		$rules = [
        'id_kmatkul' => 'required',
		'id' => 'required',
		'kelas' => 'required',
		'hari' => 'required',
		'jam_mulai' => 'required',
		'jam_selesai' => 'required',
		'kapasitas' => 'required',
         
		];

		$customMessages = [
        'required' => ':attribute wajib diisi.',
		'id.required' => 'Ruangan wajib diisi.',
		'kapasitas.required' => 'Kapasitas peserta kelas wajib diisi.',
		'kelas.required' => 'Kelas wajib diisi.',
		'hari.required' => 'Hari wajib diisi.',
		'jam_mulai.required' => 'Jam Mulai wajib diisi.',
		'jam_selesai.required' => 'Jam Selesai wajib diisi.',
		
		];

		$this->validate($request, $rules, $customMessages);
		
        Jadwal::create([
            'id_kmatkul' => $request->id_kmatkul,
            'id' => $request->id,
            'kelas' => $request->kelas,
            'hari' => $request->hari,
            'id_dosen' => '100',			
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'kapasitas' => $request->kapasitas,
        ]);
        return redirect('kelas');
    }
	
	public function storedos(Request $request, $id)
    {
        //
        //dd($request->all());
		$dosen=$request->dosen;
		Jadwal::where('id_jadwal',$id)->update(['id_dosen'=>$dosen]);
		
		
		return redirect('kelas');
    
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $show_matkul = Jadwal::findorfail($id);
        return view("/admin/Ikelas",compact("show_matkul"));
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
    public function destroyjadwal($id)
    {
       $jadwal =Jadwal::find($id)->delete();
		return redirect('kelas');
    }
}
