/*function calcAge()
			{
				alert("hello");
				var d=new Date();
				var curr_date=[];
				curr_date[0]=d.getFullYear();
				curr_date[1]=d.getMonth()+1;
				curr_date[2]=d.getDate();
				var dob=document.getElementById("dob").value;
				if(curr_date[2]>dob[2])
					curr_date[2]=curr_date[2]-dob[2]
				else
				{
					curr_date[2]=curr_date[2]+30;
					curr_date[1]=curr_date[1]-1;
					curr_date[2]=curr_date[2]-dob[2];
				}
				if(curr_date[1]>dob[1])
					curr_date[1]=curr_date[1]-dob[1];
				else
				{
					curr_date[1]=curr_date[1]+12;
					curr_date[0]=curr_date[0]-1;
					curr_date[1]=curr_date[1]-dob[1];
				}
				curr_date[0]=curr_date[0]-dob[0];
				alert(curr_date);

			}*/
			function preview()
			{
				var imgadd=document.getElementById("image").value;
				document.getElementById('demo').innerHTML="<img src='images/"+imgadd+"' width=500px height=200px>";
				return false;
			}
			function checkdob()
			{   
				var td= document.getElementById("dob").value;
				var a=td.split("/");
				var days=1,count1=0,count2=0,month=1;
				while(days<=31)
				{
					if(a[0]==days)
					{
						count1++;
					}
				days++;
				}
				while(month<=12)
				{
					if(a[1]==month)
					{
						count2++;
					}
				month++;
				}
				if(count1==0||count2==0||a[2].length!=4)
				{
					alert("Enter date in Indian format!");		
					return false;
				}
			}
			function validation()				
			{ 	
				/*var q=document.getElementById("image").value;
				if(q=="")
				{
					alert("Select image");
					return false;
				}*/
				var res="";
				var count1=0, count2=0,x,pass,cpass,z,l,m,q,c,phone,mobile;
				x=document.getElementById("user").value;
				if(x=="")
				{
					alert("Please enter user name!");
					return false;
					
				}
				pass= document.getElementById("password").value;
				cpass=document.getElementById("rpassword").value;
				if(pass=="")
				{
					alert("Enter your password!");
					return false;
				}
				else
				{
					if(cpass=="")
					{
						alert("Please confirm your password!");
						return false;
						//res=res+"Please Confirm Your Password !";
					}
					else
					{
						if(pass!=cpass)
						{ 
							alert("Enter same password!");
							return false;
							//res=res+"Enter same password";
						}
					}
				}
				var regexdigit=/[0-9]/; 																				//First name validation
				var regexsymbol=/[!@#$%^&*()_+={}[]|\"';:<,>.?\/`~]/;
				var fname=document.getElementById("fname").value;						
				if(fname=="")
				{
					alert("Please enter first name!");
					return false;		
				}
				else
				{	
					if(regexdigit.test(fname))
					{
						alert("Please enter only english alphabets!")
						return false;
					}
					else
					{
						if(regexsymbol.test(fname))
						{
							alert("Please enter only english alphabets!")
							return false;
						}
					}
					if(fname.indexOf(' ')==0)
					{
						alert("First name should not start with space!");
						return false;
					}	
				}																									//End First name validation		
				
				var lname=document.getElementById("lname").value;													//Last name validation	
				if(lname=="")
				{
					alert("Please enter last name!");
					return false;		
				}
				else
				{	if(regexdigit.test(lname))
					{
						alert("Please enter only english alphabets!")
						return false;
					}
					else
					{
						if(regexsymbol.test(lname))
						{
							alert("Please enter only English alphabets!")
							return false;
						}
					}
					if(lname.indexOf(' ')==0)
					{
						alert("Last name should not start with space!");
						return false;
					}
				}																								//End Last name validation	
							
				
				z=document.getElementById("email").value;
				if(z=="")
					{
						alert ("Enter E-mail!");
						return false;
					}
				else
				{
					b = z.split("@");
					for(var i=1;i<b.length;i++)
					count1++;
					var c= z.split(".");
					for(var j=1;j<c.length;j++)
					count2++;
					if((count1!=1)||(count2==0))
					{
						alert("Please enter valid E-mail!");
						return false;
					}
				}
				var mobile=document.getElementById("mobile").value;
				if(mobile=="")
				{
					alert("Please enter your mobile number!");
					return false;
				}
				var k=document.getElementById("dob").value;
				if(k=="")
				{
					alert("Please enter your date of birth!");
					return false;
				} 
				var m=document.getElementsByName("gender");
				if(!(m[0].checked||m[1].checked||m[2].checked))
				{
					alert("Select gender");
					return false;
				}
				var j=document.getElementById("address").value;
				if(j=="")
				{
					alert("Please enter your address!");
					return false;
				}
				var l=document.getElementById("country").value;
				if(l=="select")
				{
					alert("Please select your Country!");
					return false;
				}
				
			}
			
			function password_strength()
			{
				var pass=document.getElementById("password").value;
				if(pass.length<8)
				{
					alert("Password Length should be atleast 8");
					return false;
				}
			}
				   
			function mobile_validation()
			{
				var mobile=document.getElementById("mobile").value;
				if(mobile.length!=10)
				alert("Enter 10digit mobile number which starts with '9' or '8' or '7'");
				elseif(mobile<7000000000)
				alert("Enter 10digit mobile number which starts with '9' or '8' or '7'");	 
				return false;
			}
			function calcAge()
			{
				var count1=0, count2=0;
				var k=document.getElementById("dob").value;
				var v=k.split("/");
				var count1=0, count2=0, days=1, month=1;
				while(days<=31)
				{
					if(v[0]==days)
					{
						count1++;
					}
					days++;
				}
				while(month<=12)
				{
					if(v[1]==month)
					{
						count2++;
					}
					month++;
				}	
				if(count1==0||count2==0||v[2].length!=4)
				{
					alert("Enter date in valid format");
					return false;
				}		
				var d= new Date();
				var curr_date=[];
				var a=[];
				curr_date[2]=d.getFullYear();
				curr_date[1]=d.getMonth()+1;
				curr_date[0]=d.getDate();
				var dob1=document.getElementById("dob").value;
				var dob=dob1.split("/");			
				if(curr_date[0]>=dob[0])
				{
					a[0] = curr_date[0]-dob[0];
				}
				else
				{
					curr_date[0]= curr_date[0]+30;
					curr_date[1]= curr_date[1]-1;
					a[0]=curr_date[0]-dob[0];
				}
				if(curr_date[1]>=dob[1])
				{
					a[1]=curr_date[1]-dob[1];
				}
				else
				{
					curr_date[1]=curr_date[1]+12;
					curr_date[2]=curr_date[2]-1;
					a[1]=curr_date[1]-dob[1];
				}
				a[2]=curr_date[2]-dob[2];
				document.getElementById("age").value=a[0]+"days"+a[1]+"months"+a[2]+"years";
				return false;	
			}		
			