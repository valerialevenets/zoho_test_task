<?php

namespace App\Http\Controllers;


use App\Services\ZohoService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $service;

    public function __construct(){
        $this->service = new ZohoService();
    }


    public function index(){
        return view('contact/index');
    }

    public function show(Request $request){
        try {
            return view('contact/show', ['record' => $this->service->show($request->all()['id'],'fill percentage')]);
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function update(Request $request){
        $this->service->update($request->all()['id'],'fill percentage', $request->all()['fill_percentage']);
        return redirect()->route('contact');
    }
}
