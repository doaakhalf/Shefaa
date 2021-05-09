
@extends('layoutes.layoutes')
@extends('layoutes.custom_donation')
@section('content')
  <!--== Page Title Start ==-->
 <!--== Page Title Start ==-->
 <section class="default-bg" style="padding-top:23px;padding-bottom:55px">
  	<div class="container">
    	<div class="row white-color">
        	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 display-table" style="height:30px;">
             
              
             </div>
             <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 display-table text-right text-xs-left xs-mt-10">
             	<div class="v-align-middle text-right text-xs-center">
                	<!-- <h1 class="text-uppercase mb-0 font-600 font-20px line-height-26 mt-0">Service Boxes</h1> -->
                </div>
             </div>
           </div>
        </div>
  </section>
  <!--== Page Title End ==-->
  <!--== Page Title End ==-->

  <!--== Service Boxes Style 01 Start ==-->
  <section class="pb-0" style="background-image: url(website/images/req.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: bottom;">
    <div class="container" style="margin-top:-70px">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
        <div class="row ">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="feature-box text-center mb-50 feature-box-rounded center-feature border-radius-10" style="width: 100%;">
                <i class="icofont icofont-magic font-40px default-color"></i>
             	  <h4 class="mt-0 font-600">Write Information To Request Medicine </h4>
              	<!-- <p class="font-400 mt-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                  <form style="margin-top: 0px;" id="regForm" method="post" action="{{url('request_medication')}}">
 @csrf
  <!-- One "tab" for each step in the form: -->
  <div class="tab">Request Process:

  
    <p><input style="color:black" id="today" readonly  type="date" placeholder="yyyy-mm-dd" oninput="this.className = ''" name="date"></p>
  </div>
  <div class="tab">Medicine Info:
  <div id="medicines">
   <p>
   <select style="color:black" class="form-input" oninput="this.className = ''" name="medicines[]"  value="" >
                                <option value="" disabled selected hidden>Select Medicine</option>
                                @foreach($medicines as $medicine)
                                <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                               
                                @endforeach
                            </select>
   </p>
   <p>
   <input onchange="checkQuantity()" style="color:black" type="number" min="1" max="3" oninput="this.className = ''" name="quantities[]" class="md-input black"  placeholder="Quantity*" required="" data-error="Your Quantity requierd">
   </p>
   </div>
   <button id="addmore" style="color: white;background-color: #750909;" onclick="addElements()" >Addmore</button>
  </div>
 

  <div style="overflow:auto;">
    <div style="float:right;">
      <button style="color: black;background-color: #5c9eb9;" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button style="color: black;background-color: #5c9eb9;" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    
  </div>
</form>

          
       
           
              </div>
            </div>
            <!-- <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="feature-box text-center mb-50 feature-box-rounded center-feature border-radius-10">
                <i class="icofont icofont-globe-alt font-40px default-color"></i>
             	  <h4 class="mt-0 font-600">Development</h4>
              	<p class="font-400 mt-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="feature-box text-center mb-50 feature-box-rounded center-feature border-radius-10">
                <i class="icofont icofont-headphone-alt font-40px default-color"></i>
             	  <h4 class="mt-0 font-600">Marketing</h4>
              	<p class="font-400 mt-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              </div>
            </div> -->
        </div>
    </div>

  </section>
  <!--== Service Boxes Style 01 End ==-->

  <script>
var field = document.querySelector('#today');
var date = new Date();
field.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) +
    '-' + date.getDate().toString().padStart(2, 0);
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
    let check=checkQuantity();
    if(check==false){
      document.getElementById("nextBtn").disabled = true;
    }
    else{

      document.getElementById("nextBtn").disabled = false;
    }
 
   
  
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  console.log(n);
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y,y2, i,j, valid=true,valid2 = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  y2= x[currentTab].getElementsByTagName("select");

  // A loop that checks every input field in the current tab:
  for (j = 0; j < y2.length; j++) {
    // If a field is empty...
    if (y2[j].value == "") {
      // add an "invalid" class to the field:
      y2[j].className += " invalid";
      // and set the current valid status to false
      valid2 = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid &&valid2) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return (valid &&valid2); // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
// function addmore(){
//   let med= document.getElementById("medicines");
//   med.innerHTML+=`<p>
//    <select style="color:black" class="form-input" oninput="this.className = ''" name="medicines[]"  value="" >
//                                 <option value="" disabled selected hidden>Select Medicine</option>
//                                 @foreach($medicines as $medicine)
//                                 <option value="{{$medicine->name}}">{{$medicine->name}}</option>
                               
//                                 @endforeach
//                             </select>
//    </p>
//    <p>
//    <input type="number" oninput="this.className = ''" name="quantities[]" class="md-input black"  placeholder="Quantity*" required="" data-error="Your Quantity requierd">
//    </p>`
// }

function checkQuantity(){
  let medicineIds=[];
  let quantities=[];
  let medicines=[];
//  console.log(medicines,"ddddddddd")

var medicinesObject=<?php echo $medicines?>;

  Object.keys(medicinesObject).map(function(data){
       
        medicines.push(medicinesObject[data]);
    });
  $("select[name='medicines[]']").each(function() {
    medicineIds.push($(this).val());
});
// console.log(medicineIds,"ddddddddd")
$("input[name='quantities[]']").each(function() {
  quantities.push($(this).val());
});
for (let index = 0; index < medicineIds.length; index++) {
  let medicine = medicineIds[index];
  let quant=quantities[index];
  console.log(quant,"quant");
  for (let index2 = 0; index2 < medicines.length; index2++) {
    if(medicines[index2]['id'].toString()==medicine){
    let stored_quantity = medicines[index2].quantity;
    
    if(quant>stored_quantity){
      alert('please reduce quantity of '+medicines[index2]['name']);
      document.getElementById("nextBtn").disabled = true;
  
      return false;
    }
    else{
      document.getElementById("nextBtn").disabled = false;
    }
    }
    
  }
  


  
}
}
function addElements(){

event.preventDefault()
var y;
 
  y = document.getElementsByName("medicines[]");
  // A loop that checks every input field in the current tab:
  console.log(y[0].value);
//   if((y.length>1||y.length>0)&&y[0].value == "")
// {
//   alert("please fill values first");
//   return false;
// }
for (i = 0; i < y.length; i++) {
if((y.length>1||y.length>0)&&y[i].value == "")
{
  alert("please fill values first");
  return false;
}}
var values = [];
let filtered_ids=[];
var out=[];
var medicinesarr=[];
$("select[name='medicines[]']").each(function() {
    values.push($(this).val());
});
var medicines=<?php echo $medicines?>;
  Object.keys(medicines).map(function(data){
        out.push(medicines[data]['id'].toString()) ;
        medicinesarr.push(medicines[data]);
    });

 let difference = out.filter(x => !values.includes(x));
for (let index = 0; index < medicinesarr.length; index++) {
 if(difference.includes(medicinesarr[index]['id'].toString())){
  filtered_ids.push(medicinesarr[index])
 }
  
}


          // var bigdiv = document.getElementById('medicines');
          let newdiv = document.createElement('div');
          newdiv.setAttribute("id","newdiv");
          if(filtered_ids.length==0)
          {
            alert('there is no more medicines');
          }
          var newsel = document.createElement('select');
  newsel.name="medicines[]" ;
  newsel.value="" ;
  newsel.className="form-input black";
   var opt = document.createElement('option');

// create text node to add to option element (opt)
opt.appendChild( document.createTextNode('select medicine') );

// set value property of opt
opt.value = ''; 
opt.setAttribute("selected","true")
opt.setAttribute("disabled","true");
opt.setAttribute("hidden","true");


// add opt to end of select box (sel)
newsel.appendChild(opt); 
$.each(filtered_ids, function(key, value) { 
 
 



var opt2 = document.createElement('option');
// create text node to add to option element (opt)
opt2.appendChild( document.createTextNode(value['name']) );
// set value property of opt
opt2.value =value['id']; 
// add opt to end of select box (sel)
newsel.appendChild(opt2); 
 



  newdiv.appendChild(newsel);
  // newdiv.appendChild(newinput);
  // document.getElementById('medicines').appendChild(newdiv);
// <input style='color:black' type='number' name='quantities[]' class='md-input black'  placeholder='Quantity*' required='' data-error='Your Quantity requierd'>
// 
})
var newinput = document.createElement('input');
newinput.name="quantities[]" ;
newinput.type="number" ;
newinput.min="1";
newinput.max="3";
newinput.onchange=checkQuantity;
newinput.className="md-input black";
newinput.placeholder="Quantity *"
newdiv.appendChild(newinput);
  document.getElementById('medicines').appendChild(newdiv);

}

</script>
@endsection