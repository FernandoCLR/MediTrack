
@extends('layouts.app')
@section('content')
<br>
<div class="card mx-5">

    <div class="card-header bg-primary text-light"><h3>About MediTrack</h3></div><br>
    <div class="card-body "><p>MediTrack is a Medical Status Tracking System which provides the user
        to keep all their medical related information and activites in a singel place without browsing 
    many diffrent web pages. This particular system can provide a solution for manual file keeping mechanisum
which takes huge physical storage and may have to greater possibiltiy in loosing valuble user medical information 
as this system provides you with a web based system you have the ablility to access information from any 
part of the globe, no matter from where you take medical treatments doctors can access user account and update 
the status of the user. That will increse the information accessibility and reduse rate of data losses and 
bring the Sri Lankan Health Sector to a new generations </p>
<br>
<h4>Different User Accounts</h4>
<ol>
    <li><b>Basic User Account </b> All users basicaly register in the system gets this type of account where this user gets some basic editing 
        featues and data viewing privilages realted user account.
    <li><b>Nurse User Account </b> In this type of account user given some additional privilages to view patients 
        information some extents with some restrictions. If the user requires Nurse privilaged account have to
        request through following form..</li>  
    <li><b>Hospital User Account</b> : except other user account these type of account provides features to add 
        chanelling data and view user created channel requests and payment status of those channels. If the 
    user requires Hospital privilaged account hospital have to request through following form.</li>  
    </li>
    <li><b>Doctor User Account </b> is the most privilaged account where this user account can add, delete, edit patiants
        information and can be consider as most privilaged accout in the system. If the user requires this privilaged account 
        have to request through following form. 
    </li>
</ol>
<br>
<h4>Form to Request Privilages.</h4>
<p>User can request for Nurse User Account or Hospital User Account or Doctor User Account by following
    this link -> <a href="https://docs.google.com/forms/d/e/1FAIpQLSdB6Lhv-XJ4AvMTbbav7vl1AfKYJt3BaEugwkeLmxb53uRLrQ/viewform?vc=0&c=0&w=1">Request Form</a> </p>
    
<br>
</div><br>
@endsection