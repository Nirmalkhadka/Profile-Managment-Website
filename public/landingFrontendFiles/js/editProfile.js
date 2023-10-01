// multi step form process

const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");


let formStepsnum = 0;

nextBtns.forEach((btn) =>{
  btn.addEventListener("click",()=>{
    formStepsnum++;
    updateFormSteps();
    updateProgressbar();

  });
});
prevBtns.forEach((btn) =>{
  btn.addEventListener("click",()=>{
    formStepsnum--;
    updateFormSteps();
    updateProgressbar();

  });
});

function updateFormSteps(){

  formSteps.forEach((formstep)=>{
    formstep.classList.contains("form-step-active") &&
      formstep.classList.remove("form-step-active");
  });

  formSteps[formStepsnum].classList.add("form-step-active");
}

function updateProgressbar(){
  progressSteps.forEach((progressStep, idx) => {
    if(idx< formStepsnum + 1){
      progressStep.classList.add('progress-step-active');
    }
    else{
      progressStep.classList.remove('progress-step-active');
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width = 
  ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";

}


// end

// dynamic skill form




const addBtn = document.getElementById("add");


const addBtn3 = document.getElementById("add5");


const form = document.querySelector(".form-group-part2");

const form5 = document.querySelector(".form-group-part5");

var i = 2;

function Input2(){

  const div = document.createElement("div");
  div.className ="sub";


  const div1 = document.createElement("div");

  const label = document.createElement("label");
  label.innerHTML = "Skill";

  const input = document.createElement("input");
  input.type="text";
  input.id="skill";
  input.name="pskill[]";

  

  const div2 = document.createElement("div");
  div2.className ="sub-1";

  const label2 = document.createElement("label");
  label2.innerHTML = "% You Cover : ";

  const input2 = document.createElement("input");
  input2.type="number";
  input2.id="name";
  input2.name="pperCover[]";

  const div8 = document.createElement("div");
  div8.className ="rm-group";

  const a1 = document.createElement("a");
  a1.className = "remove";
  a1.id = "add3";
  
  a1.addEventListener("click", removeInputSkill);

  const i1 = document.createElement("i");
  i1.className = "bx bxs-trash";

  function removeInputSkill(){
    div.parentNode.removeChild(div);
  }

  form5.appendChild(div);

  div.appendChild(div1);
  div.appendChild(div2);

  div1.appendChild(label);
  div1.appendChild(input);

  div2.appendChild(label2);
  div2.appendChild(input2);
  
  div.appendChild(div8);
  div8.appendChild(a1);
  a1.appendChild(i1);

}
function addInput(){

  const div = document.createElement("div");
  div.className ="sub";


  const div1 = document.createElement("div");

  const label = document.createElement("label");
  label.innerHTML = "Skill";

  const input = document.createElement("input");
  input.type="text";
  input.id="skill";
  input.name="skill[]";

  

  const div2 = document.createElement("div");
  div2.className ="sub-1";

  const label2 = document.createElement("label");
  label2.innerHTML = "% You Cover : ";

  const input2 = document.createElement("input");
  input2.type="number";
  input2.id="name";
  input2.name="perCover[]";

  const div8 = document.createElement("div");
  div8.className ="rm-group";

  const a1 = document.createElement("a");
  a1.className = "remove";
  a1.id = "add3";
  a1.addEventListener("click", removeInputSkill);

  const i2 = document.createElement("i");
  i2.className = "bx bxs-trash";

  function removeInputSkill(){
    div.parentNode.removeChild(div);
  }

  form.appendChild(div);

  div.appendChild(div1);
  div.appendChild(div2);

  div1.appendChild(label);
  div1.appendChild(input);

  div2.appendChild(label2);
  div2.appendChild(input2);
  
  div.appendChild(div8);
  div8.appendChild(a1);
  a1.appendChild(i2);

}

addBtn.addEventListener("click",addInput);
addBtn3.addEventListener("click",Input2);


// end

// dynamic education form

const addBtn2 = document.getElementById("add4");
// var i=0;
// const removebtn = document.getElementById("rm"+(i++));

const form2 = document.querySelector(".form-group-part3");
// const form4 = document.querySelector(".sub6");
// const form3 = document.querySelector(".form-dynamic-inner");


// function remove(){
//   form4.parentNode.removeChild(form4);
  
// }

// removebtn.addEventListener("click",remove);



function addInput2(){

  const div7 = document.createElement("div");
  div7.className ="form-dynamic-inner";

  const label3 = document.createElement("label");
  label3.innerHTML = "Degree Name : ";

  const input3 = document.createElement("input");
  input3.type="text";
  input3.id="Degree-name";
  input3.name="degreeName[]";

  const div3 = document.createElement("div");
  div3.className ="sub2";

  const div4 = document.createElement("div");

  const label4 = document.createElement("label");
  label4.innerHTML = "Start Date : ";  

  const input4 = document.createElement("input");
  input4.type="date";
  input4.id="startdate";
  input4.name="startDate[]";

  const div5 = document.createElement("div");

  const label5 = document.createElement("label");
  label5.innerHTML = "End Date : "; 

  const input5 = document.createElement("input");
  input5.type="date";
  input5.id="enddate";
  input5.name="endDate[]";


  const label6 = document.createElement("label");
  label6.innerHTML = "Instutition Name : ";

  const input6 = document.createElement("input");
  input6.type="text";
  input6.id="inist-name";
  input6.name="instutionName[]";


  const label7 = document.createElement("label");
  label7.innerHTML = "Major Subject : ";

  const input7 = document.createElement("input");
  input7.type="text";
  input7.id="major-subject";
  input7.name="majorSubject[]";

  const div6 = document.createElement("div");
  div6.className ="rm-group";

  const a = document.createElement("a");
  a.className = "remove";
  a.id = "add1";
  a.addEventListener("click", removeInput);

  const i3 = document.createElement("i");
  i3.className = "bx bxs-trash";


  function removeInput(){
    div7.parentNode.removeChild(div7);
  }

  

  const hr = document.createElement("hr");
  hr.className = "dynamic-hr";
  form2.appendChild(div7);

  div7.appendChild(label3);
  div7.appendChild(input3);
  div7.appendChild(div3);
  div3.appendChild(div4);
  div4.appendChild(label4);
  div4.appendChild(input4);

  div3.appendChild(div5);
  div5.appendChild(label5);
  div5.appendChild(input5);

  div7.appendChild(label6);
  div7.appendChild(input6);
  div7.appendChild(label7);
  div7.appendChild(input7);
  div7.appendChild(div6);
  div6.appendChild(a);
  a.appendChild(i3);
  div7.appendChild(hr);


}




addBtn2.addEventListener("click",addInput2);