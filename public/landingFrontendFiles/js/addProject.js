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
  label.innerHTML = "Language";

  const input = document.createElement("input");
  input.type="text";
  input.id="skill";
  input.name="language[]";
  input.className = "language";

  

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
  
  div.appendChild(div8);
  div8.appendChild(a1);
  a1.appendChild(i2);

}

addBtn.addEventListener("click",addInput);
// addBtn3.addEventListener("click",Input2);


// end

