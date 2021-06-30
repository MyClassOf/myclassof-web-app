let selection_1= document.getElementById("input1");
let text_input= document.getElementById("input2");
let selection_2 = document.getElementById('input3');
function Random() 
   { 
     if(selection_1.value === "High School")
     {
       text_input.innerHTML= "<br> <h3 class='gradQ2'> high school diploma from:</h3> <input type='text' class='other-input' placeholder='Enter School Name' required>";
        selection_2.style.visibility='hidden';
      }
      
     if(selection_1.value==="College/University")
     {
         text_input.innerHTML=
         `<select class="gradSelect" style="margin-top:3%"; required>
         <option>Select One</option>
         <option>Associates of Arts</option>
         <option>Associates of Science</option>
         <option>Associates of Applied Arts</option>
         <option>Associates of Applied Science</option>
         <option>Bachelors of Art</option>
         <option>Bachelors of Arts in Education</option>
         <option>Bachelors of Science</option>
         <option>Bachelors of Fine Arts</option>
         </select>`;
      }
      
     if(selection_1.value==="Graduate School")
     {
         text_input.innerHTML=
         `<select class="gradSelect2" style="margin-top:3%"; required>
         <option>Select One</option>
         <option>Masters of Arts(MA)</option>
         <option>Associates of Science</option>
         <option>Mastersof Arts in Education(MAE)</option>
         <option>Master of Fine Arts(MFA)</option>
         <option>Master of Laws(LLM)</option>
         <option>Masters of Business Administration(MBA)</option>
         <option>Executive Masters of Business Administration (EMBA)</option>
         <option>Doctoral Degree(PhD)</option>
         <option>Juris Doctorate Degree(JD)</option>
         <option>Doctor of Medicine Degree(MD)</option>
         <option>Doctor of Dental Surgery Degree(DDS)</option>
         <option>Doctor of Laws(JSD/SJD)</option>
         </select>`;   
      }
      
     if(selection_1.value=== "Trade School")
     {
         text_input.innerHTML= "<input type='text' class='other-input2' style='margin-top:5%'; placeholder='Enter Dipolma and/or Certification' required>";
        selection_2.style.visibility='hidden';   
      }
      
     if(selection_1.value=== "Vocational College")
     {
          text_input.innerHTML= "<input type='text' class='other-input2' style='margin-top:5%';  placeholder='Enter Dipolma and/or Certification' required>";
        selection_2.style.visibility='hidden';   
      }
      if(selection_1.value === "Select One")
      {
          text_input.innerHTML=" ";
      }
      
    //  else
    //  {
    //     text_input.innerHTML= "<input type='text' placeholder='Enter Degree Title'>";
    //     selection_2.style.visibility='hidden';  
    //   }
    
   }
   

   
