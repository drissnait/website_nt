@extends('layouts.base')

@section('title', 'Export étudiants')

@section('content')


<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">

        </div>
        <!-- <h1> Exportation Excel </h1> -->
        <h2 class="mb-3">Export des données</h2>
        <div class="card-body">
            <form action="{{ route('export') }}" method="POST" enctype="multipart/form-data">
                @csrf
                     <div class="form-group row">

                         {{ csrf_field() }}
                         <br>
                      <!-- <input type="checkbox"  name="voieExport" value="APP"> <label> APP </label><br>
                      <input type="checkbox"  name="voieExport" value="Class"> <label> Class </label><br> -->
                      <label class="col-sm-2 col-form-label font-weight-bold">Voies</label>
                      <select name="voieExport"  class="form-control">
                        <option value="CLASS"> CLASS </option>
                        <option value="APP"> APP </option>
                      </select><br>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label font-weight-bold">Promotion</label>
                      <select name="promotionExport"  class="form-control">
                        <option value="L3"> L3 </option>
                        <option value="M1"> M1 </option>
                        <option value="M2"> M2 </option>
                      </select>

                    </div>

                    <!-- <input type="submit" value="Exporter">  -->
                    <!-- <a type="submit" value="Exporter" >Exporter la base</a> -->
                    <input type="submit" value="Exporter les données" class="btn btn-success btn-block mb-2">


            </form>
        </div>
    </div>
</div>

@endsection
