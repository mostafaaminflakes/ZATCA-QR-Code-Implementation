<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Par_code;
use Illuminate\Http\Request;
use App\Http\Controllers\SallaController;
class ParCodeController extends Controller
{
    
    public function __construct()
    {
        
      
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qr='';
        
        $salla =new SallaController();

        $par_code=  $artikel =  Par_code::where('id', '4')->first();

        $qr_code=[
            'seller_name'=>$par_code->company_name,
            'vat_number'=>$par_code->tax_id,
            'invoice_date'=>$par_code->print_time,
            'total_amount'=>$par_code->tot_vat,
            'vat_amount'=>$par_code->tot_vat,
            
    ];
    $qr = $salla->render($qr_code);
    $data=[
        'id'=>$par_code->id,
        'par_code'=>$this->qr_code($qr),
        'company_name'=>$par_code->company_name,
        'vat_number'=>$par_code->tax_id,
        'invoice_date'=>$par_code->print_time,
        'total_amount'=>$par_code->tot_vat,
        'vat_amount'=>$par_code->tot_vat,
    ];
        
       

        $pdf = PDF::loadView('pdf-with-qr', $data);
        return $pdf->download('test.pdf');

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Par_code  $par_code
     * @return \Illuminate\Http\Response
     */
    public function show(Par_code $par_code)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Par_code  $par_code
     * @return \Illuminate\Http\Response
     */
    public function edit(Par_code $par_code)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Par_code  $par_code
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Par_code $par_code)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Par_code  $par_code
     * @return \Illuminate\Http\Response
     */
    public function destroy(Par_code $par_code)
    {
        //
    }
    public function qr_code($code)
    {
        return '<img style="width: 200px;" src="' . $code . '" alt="QR Code" />';
    }
}
