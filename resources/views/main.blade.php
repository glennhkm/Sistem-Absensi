@extends('layout')

@section('title','Main Page')

@section('body')
    <div class=" clear-right">
        <div class=" w-[919px] h-[178px] bg-[#4F826F] rounded-[45px] mt-[35px] mr-[50px] float-right">
            <p class=" font-bold text-white text-[25px] ml-[50px] pt-[15px] ">Welcome Back,</p>
            <p class=" w-[527px] text-justify text-white font-medium text-[15px] ml-[50px] mt-[10px]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi totam sequi maxime odio minus tempora accusamus quibusdam asperiores deserunt mollitia! Maxime ut animi optio amet obcaecati ad itaque odio quasi odit?</p>
        </div>

        <div class=" w-[913px] h-[350px] border-[3px] border-[#4F826F] rounded-[45px] float-right mt-[20px] mr-[50px] box-border p-[25px] clear-both">
            <div class=" w-[410px] h-[297px] border border-black rounded-[45px] float-left">
                <p  class=" font-normal text-[20px] ml-[40px] mt-[15px]">Catatan</p>
            </div>
            <div id="kalender" class=" w-[410px] h-[297px] border border-black rounded-[45px] float-right">

            </div>
        </div>
    </div>
@endsection