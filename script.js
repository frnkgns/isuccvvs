    //eto yung id ng code inputbox
    const getcode = document.getElementById("code");
    const notreg_text = document.getElementById('notreg-text');
    notreg_text.classList.add('hide');

    const addbtn = document.getElementById("add");
    const updatebtn = document.getElementById("update");
    const deletebtn = document.getElementById("delete");

    addbtn.addEventListener('click', showAdd);

    //so dinagdagan natin ng eventlistener para may gagawin sya

    //once priness natin yung enter Key sa laptop or sa cp keyboard
    //mag proceed na sya sa main html natin
    getcode.addEventListener("keyup", function(event) {
        if (event.key == "Enter") {
            for(let i = 0; i < codes.length; i++){
                //so first needed natin icompare kung tama ba yung code na ininput ni user
                if(getcode.value == "ccsict"){
                    //if true go
                    notreg_text.textContent = 'Proceeding to voting area.';
                    getcode.style.boxShadow = 'none'
                    notreg_text.style.color = 'green'
                    notreg_text.classList.remove('hide');
                    getcode.classList.add('loggedin');

                    //delay natin yung pag lipat sa main area para kunwari may loading naman
                    //then sa loob ibabalik lang natin yung default value ng mga elements
                    setTimeout(function(){
                        notreg_text.textContent = 'Code is not Registered.'
                        notreg_text.classList.add('hide');
                        getcode.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 1)'
                        getcode.value = ''
                        getcode.classList.remove('loggedin');
                        window.location.href = "main.php";
                },1500);

                break;
                    
                } else if(getcode.value == "123"){
                    alert(getcode);
                    notreg_text.textContent = "";
                    getcode.classList.add('hide');
                    hidebtn.forEach(function(e){
                        e.classList.remove('hide');
                    });

                }else if($college == '' || $college == null){
                    //kapag naman walang input
                    notreg_text.textContent = 'Please enter your code to proceed.'
                    notreg_text.style.color = 'blue'
                    notreg_text.classList.remove('hide');
                    getcode.style.boxShadow = 'none'
                    getcode.classList.add('noinput');

                    //then needed natin ibalik yung binago nating value sa taas, then syempre need natin itago ulit yung notice
                    //itong set timeout is basically a delay, bago nya ihide or irevert back

                } else {
                    //then kapag d tugma yung code eto babato natin
                    getcode.style.boxShadow = 'none'
                    getcode.classList.add('notregistered');
                    notreg_text.style.color = 'red'
                    notreg_text.classList.remove('hide');
                    
                    //then basically ito bago sya pumasok sa voting area we will add delay then ibabalik natin yung value ng
                    //mga elements na ginamit during log in by defualt
                    setTimeout(function(){
                        notreg_text.classList.add('hide');
                        getcode.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 1)'
                        getcode.classList.remove('notregistered');
                },1500);
                }
            }
        }
    });

    function showAdd(){
        notreg_text.textContent = 'Proceeding to Admin panel.';
        getcode.style.boxShadow = 'none';
        notreg_text.style.color = 'green';
        notreg_text.classList.remove('hide');
        getcode.classList.add('loggedin');

        setTimeout(function(){
            notreg_text.textContent = 'Code is not Registered.'
            notreg_text.classList.add('hide');
            getcode.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 1)'
            getcode.classList.remove('noinput');
            window.location.href = "admin.php";
    },1500);
    }
    //end of Log in Form

    //Start of Main Form
