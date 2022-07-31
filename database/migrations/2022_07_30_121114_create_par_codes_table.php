<?php

use Dompdf\FrameDecorator\Text;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('par_codes', function (Blueprint $table) {
            $table->id();
            // $table->string('Company_name','300'); //  إسم الشركة 
            // $table->string('reqistration_id')->notnull(); // الرقم الضريبي
            // $table->string('tax_id'); // الرقم الضريبي
            // $table->date('print_time');  //تاريخ وزمن الفاتورة
            // $table->float('tot_vat'); //, -- المبلغ الاجمالي للفاتورة
            // $table->float('vat'); // -- قيمة ضريبة االفاتورة
            // $table->string('inv','20'); //-- رقم الفاتورة
            // $table->string('printed_time') ;//-- فلاك للتميز
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('par_codes');
    }
}
