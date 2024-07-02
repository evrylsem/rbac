@extends('mainLayout')

@section('page-content')
<div class="container">
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <form action="{{ route('saveledger') }}" method="post">
        @csrf
        <div class="row">
        <div class="col" style="font-size: 2rem; font-weight:bold;">
            <a href="{{ route('acctg') }}" class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(129, 0, 0, 1);transform: ;msFilter:;"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg></a>
            Create New Ledger.
            <hr>
        </div>
    </div>
    <div class="row">
        <!-- <div class="col-sm-4"></div> -->
        <div class="col py-3">
            <div>
                <label for="entrydetail" class="form-label">Entry Detail:</label>
                <textarea name="entrydetail" id="entrydetail" cols="30" rows="5" class="form-control form-control-sm" style="resize:none;"></textarea>
            </div>
            <div>
                <label for="entryamount" class="form-label">Amount:</label>
                <input type="text" class="form-control form-control-sm text-end" id="entryamount">
            </div>
        </div>
        <!-- <div class="col-sm-4"></div> -->
    </div>
    <div class="row">
        <!-- <div class="col-4"></div> -->
        <div class="col text-center py-3">
            <button type="reset" class="m-2 " style="font-weight:bold; width: 8rem; background-color: transparent; padding: 1rem; border: 2px solid #810000; border-radius: 1.5rem;">Clear</button>
            <button type="submit" class="btn m-2" style="font-weight:bold; width: 8rem; background-color: #810000; color:#ffff; padding: 1rem; border-radius: 1.5rem;">
                Submit
            </button>
        </div>
        <!-- <div class="col-4"></div> -->
    </div>
    </form>
    <!-- <div class="row">
        <div class="col">
            <a href="{{ route('acctg') }}" class="link-dark">Back</a>
        </div>
    </div> -->
</div>
@endsection
