<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PlanesExport;
use App\Charts\SampleChart;
use App\Trains_reservation;
use DB;
use PDF;
use App\Planes_reservation;
class LaporanController extends Controller
{
	/**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
		
	$today_users = Trains_reservation::whereDate('created_at', today())->count()+Planes_reservation::whereDate('created_at', today())->count();
	$yesterday_users = Trains_reservation::whereDate('created_at', today()->subDays(1))->count()+Planes_reservation::whereDate('created_at', today()->subDays(1))->count();
	$users_2_days_ago = Trains_reservation::whereDate('created_at', today()->subDays(2))->count()+Planes_reservation::whereDate('created_at', today()->subDays(2))->count();
	$users_3_days_ago = Trains_reservation::whereDate('created_at', today()->subDays(3))->count()+Planes_reservation::whereDate('created_at', today()->subDays(3))->count();
	$users_4_days_ago = Trains_reservation::whereDate('created_at', today()->subDays(4))->count()+Planes_reservation::whereDate('created_at', today()->subDays(4))->count();
	$users_5_days_ago = Trains_reservation::whereDate('created_at', today()->subDays(5))->count()+Planes_reservation::whereDate('created_at', today()->subDays(5))->count();
	$users_6_days_ago = Trains_reservation::whereDate('created_at', today()->subDays(6))->count()+Planes_reservation::whereDate('created_at', today()->subDays(6))->count();
	$users_7_days_ago = Trains_reservation::whereDate('created_at', today()->subDays(7))->count()+Planes_reservation::whereDate('created_at', today()->subDays(7))->count();
	$chart = new SampleChart;
	$chart->labels(['Tujuh hari lalu','Enam hari lalu','Lima hari lalu','Empat hari lalu','Tiga hari lalu','Dua hari lalu', 'Kemarin', 'Hari Ini']);
	$chart->dataset('Laporan Transaksi', 'line', [$users_7_days_ago,$users_6_days_ago,$users_5_days_ago,$users_4_days_ago,$users_3_days_ago,$users_2_days_ago, $yesterday_users, $today_users]);
		return view('laporan.hari',compact('chart'));
	}
    public function bulan(){
    	$thismonth = Trains_reservation::whereMonth('created_at',today())->count()+planes_reservation::whereMonth('created_at',today())->count();
		$lastmonth = Trains_reservation::whereMonth('created_at', today()->subMonths(1))->count()+planes_reservation::whereMonth('created_at', today()->subMonths(1))->count();
		$last2month = Trains_reservation::whereMonth('created_at', today()->subMonths(2))->count()+planes_reservation::whereMonth('created_at', today()->subMonths(2))->count();
		$last3month = Trains_reservation::whereMonth('created_at', today()->subMonths(3))->count()+planes_reservation::whereMonth('created_at', today()->subMonths(3))->count();
		$last4month = Trains_reservation::whereMonth('created_at', today()->subMonths(4))->count()+planes_reservation::whereMonth('created_at', today()->subMonths(4))->count();
		$last5month = Trains_reservation::whereMonth('created_at', today()->subMonths(5))->count()+planes_reservation::whereMonth('created_at', today()->subMonths(5))->count();
		$last6month = Trains_reservation::whereMonth('created_at', today()->subMonths(6))->count()+planes_reservation::whereMonth('created_at', today()->subMonths(6))->count();
	$chart = new SampleChart;
	$chart->labels(['Enam Bulan lalu','Lima Bulan lalu','Empat Bulan lalu','Tiga Bulan lalu','Dua Bulan lalu', 'Satu Bulan lalu', 'Bulan Ini']);
	$chart->dataset('Laporan Transaksi', 'line', [$last6month,$last5month,$last4month,$last3month,$last2month,$lastmonth, $thismonth]);
		return view('laporan.bulan',compact('chart'));
    }
    public function transaksiPesawatExcel(Request $request){
    	$nama = 'laporan_transaksi_pesawat'.date('Y-m-d_H-i-s');
        Excel::create($nama, function ($excel) use ($request) {
        $excel->sheet('Laporan Data Transaksi Pesawat', function ($sheet) use ($request) {
        
        $sheet->mergeCells('A1:I1');

       // $sheet->setAllBorders('thin');
        $sheet->row(1, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setAlignment('center');
            $row->setFontWeight('bold');
        });

        $sheet->row(1, array('LAPORAN DATA TRANSAKSI PESAWAT'));

        $sheet->row(2, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setFontWeight('bold');
        });
       // $sheet->appendRow(array_keys($datas[0]));
        $sheet->row($sheet->getHighestRow(), function ($row) {
            $row->setFontWeight('bold');
        });
        $datas = Planes_reservation::get();
         $datasheet = array();
         $datasheet[0]  =   array("NO", "NAMA OPERATOR", "NAMA PEMESAN", "NAMA PESAWAT",  "BERANGKAT DARI","JUTUAN","WAKTU KEBERANGKATAN", "KURSI PILIHAN","HARGA TIKET");
         $i=1;

        foreach ($datas as $data) {
        	if($data->planes_class_seat == 'Ekonomi') {
                			$harga=$data->planes_schedule->eco_seat_pay;
           					 }
            			elseif ($data->planes_class_seat == 'Bisnis') {
            				$harga=$data->planes_schedule->bus_seat_pay;
            			}
            			elseif ($data->planes_class_seat=='Utama') {
            				$harga=$data->planes_schedule->first_seat_pay;
            			 }
           // $sheet->appendrow($data);
          $datasheet[$i] = array($i,
                        $data->user->fullname,
                        $data->customer->name,
                        $data->planes_schedule->planes_detail->planes->name,
                        $data->planes_schedule->from,
                        $data->planes_schedule->destination,
                        $data->planes_schedule->boardingtime,
                        $data['planes_class_seat'],
                    	$harga
                    );
          
          $i++;
        }

        $sheet->fromArray($datasheet);
    });

})->export('xls');

    }
    public function transaksipesawatPdf(Request $request)
    {
        $datas = Planes_reservation::get();

       // return view('laporan.transaksi_pdf', compact('datas'));
       $pdf = PDF::loadView('laporan.transaksi_pesawat_pdf', compact('datas'));
       return $pdf->download('laporan_transaksi_pesawat'.date('Y-m-d_H-i-s').'.pdf');
    }
    public function transaksikeretaPdf(Request $request)
    {
        $datas = Trains_reservation::get();

       // return view('laporan.transaksi_pdf', compact('datas'));
       $pdf = PDF::loadView('laporan.transaksi_kereta_pdf', compact('datas'));
       return $pdf->download('laporan_transaksi_kereta'.date('Y-m-d_H-i-s').'.pdf');
    }
    public function transaksikeretaExcel(Request $request){
    	$nama = 'laporan_transaksi_kereta'.date('Y-m-d_H-i-s');
        Excel::create($nama, function ($excel) use ($request) {
        $excel->sheet('Laporan Data Transaksi kereta', function ($sheet) use ($request) {
        
        $sheet->mergeCells('A1:I1');

       // $sheet->setAllBorders('thin');
        $sheet->row(1, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setAlignment('center');
            $row->setFontWeight('bold');
        });

        $sheet->row(1, array('LAPORAN DATA TRANSAKSI KERETA'));

        $sheet->row(2, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setFontWeight('bold');
        });
       // $sheet->appendRow(array_keys($datas[0]));
        $sheet->row($sheet->getHighestRow(), function ($row) {
            $row->setFontWeight('bold');
        });
        $datas = Trains_reservation::get();
         $datasheet = array();
         $datasheet[0]  =   array("NO", "NAMA OPERATOR", "NAMA PEMESAN", "NAMA KERETA",  "BERANGKAT DARI","JUTUAN","WAKTU KEBERANGKATAN", "KURSI PILIHAN","HARGA TIKET");
         $i=1;

        foreach ($datas as $data) {
        	if($data->trains_class_seat == 'Ekonomi') {
                			$harga2=$data->trains_schedule->eco_seat_pay;
           					 }
            			elseif ($data->trains_class_seat == 'Bisnis') {
            				$harga2=$data->trains_schedule->bus_seat_pay;
            			}
            			elseif ($data->trains_class_seat=='Executive') {
            				$harga2=$data->trains_schedule->exec_seat_pay;
            			 }
           // $sheet->appendrow($data);
          $datasheet[$i] = array($i,
                        $data->user->fullname,
                        $data->customer->name,
                        $data->trains_schedule->trains_detail->trains->name,
                        $data->trains_schedule->from,
                        $data->trains_schedule->destination,
                        $data->trains_schedule->boardingtime,
                        $data['trains_class_seat'],
                    	$harga2
                    );
          
          $i++;
        }

        $sheet->fromArray($datasheet);
    });

})->export('xls');

    }
}
