@extends('layouts.agentDashboard')

@section('content')
<div class="flex justify-center">

</div>


<div class="container m-4 w-100% pt-0" style="display: flex;">


<!-- seperate 2 rows -->
<div style="float: left; width:100%; padding-left:1%; padding-right:1%;">

<div style="display: flex;">




<livewire:agents.total-calls />

<livewire:agents.answered />

<livewire:agents.total-break />




</div>


<div style="display: flex;">

<livewire:agents.messages />
<livewire:agents.skills />
<livewire:agents.call-queue />



</div>

</div>
<!-- close of 2 rows -->





<div style="width: 40%; padding-right:0%;" class="pt-3">

<livewire:agents.agents/>

</div>


</div>






@endsection



