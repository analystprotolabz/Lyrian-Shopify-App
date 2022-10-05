<style type="text/css">
.loader{
		display: none;
	}

	.__showloader {
	    position: fixed;
	    width: 100%;
	    height: 100%;
	    top: 0;
	    left: 0;
	    right: 0;
	    bottom: 0;
	    background-color: rgba(0,0,0,0.2);
	    z-index: 2;
	    cursor: pointer;
	    text-align: center;
	    display: flex;
	    align-items: center;
	    justify-content: center;
        z-index: 9999999;
	}

	  .__showloader svg {
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  margin: -20px 0 0 -20px;
	  width: 40px;
	  height: 40px;
	  z-index: 1;
	  -webkit-animation: spin .7s linear infinite;
	    animation: spin .7s linear infinite;
	    z-index: 99999 !important;
	    opacity: 1 !important; 
	  }
	  .__showloader svg path {
	  fill: #007b5c;
	  }
	  @-webkit-keyframes spin {
	  0%   {-webkit-transform: rotate(0deg);}

	  100% {-webkit-transform: rotate(360deg);}
	  }
	  @keyframes spin {
	  0%   {transform: rotate(0deg);}

	  100% {transform: rotate(360deg);}
	  }

	  div#wrapper_canvas_background {
	      position: relative;
	   }

	
ul.main_links_wraps {
	padding-left: 0px;
}

ul.main_links_wraps li{
	display: inline-flex;
}

nav.navbar.navbar-expand-lg.navbar-light.bg-light{
	justify-content: center;
	widows: 90%;
}

ul.main_links_wraps li {
    margin: 0px 15px;
}

ul.main_links_wraps li a{
	font-weight: 400;
	font-size: 14px;
	line-height: 22px;
	color: #1C2B4B;
	border-bottom: 1px solid transparent;
    padding: 5px 5px;
}


a.navbar-link.active {
    font-weight: 600;
    border-bottom: 1px solid;
}

.form-group.has-search {
    position: relative;
    margin-bottom: 30px;
}

span.search_icons {
    position: absolute;
    top: 13px;
    left: 13px;
}

.form-group.has-search input {
    height: 40px;
    border: 1px solid #DFE1E5;
    border-radius: 8px;
    padding-left: 45px;
    font-size: 16px;
}

.form-group.has-search input:focus{
	box-shadow: none;
	outline: none;
}

.wrap-text-left{
	font-size: 14px;
	color: #1C2B4B;
	line-height: 22px;
	font-family: 'SF Pro Display', sans-serif;
}

p.wrap-text-left {
    padding-top: 8px;
}

.wrap-text-right button{
	color: #535F77;
	font-size: 14px;
	line-height: 20px;
	font-family: 'SF Pro Display', sans-serif;
	border: 1px solid #E2E5EA;
    box-shadow: 0px 2px 4px rgb(97 108 134 / 6%);
    border-radius: 8px;
    padding: 10px 12px;
    float: right;
}

.wrap-text-right button:hover{
	border: 1px solid #E2E5EA;
    box-shadow: 0px 2px 4px rgb(97 108 134 / 6%);
    text-decoration: none;
    color: #535F77;
}

/********************************************switch toggle*************************************/

.switch {
  position: relative;
  display: inline-block;
  width: 48px;
  height: 24px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #DFE1E5;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #3C982C;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}



/********************************************switch toggle*************************************/

a.wrap_delete {
    border: 1px solid #E2E5EA;
    box-shadow: 0px 2px 4px rgb(97 108 134 / 6%);
    border-radius: 4px 0px 0px 4px;
    padding: 2px 4px;
}

a.wrap_edit {
    border: 1px solid #E2E5EA;
    box-shadow: 0px 2px 4px rgb(97 108 134 / 6%);
    border-radius: 0px 4px 4px 0px;
    padding: 2px 5px;
}

a.wrap_delete svg {
    position: relative;
    left: 2.5px;
}

.table-striped tbody tr:nth-of-type(odd){
	background-color: #fff;
}

.table td{
	border: 0px;
}

.table tr th{
	font-size: 16px;
	line-height: 19px;
	color: #6D778A;
    font-weight: 400;
    padding-top: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #DFE1E5;
    border-top: 1px solid #DFE1E5;
}

.table-responsive {
    margin-top: 18px;
}

table.table.table-striped tr td {
    padding-top: 15px !important;
}

.button_productoption {
    text-align: right;
    margin-top: 20px;
}

button.btn.btn-primary.add_product-options {
    font-size: 14px;
    line-height: 20px;
}


.button_productoption button{
	width: 190px;
	height: 44px;
	background: #377DFF;
	border-color: #377DFF;
	border-radius: 8px;
	font-weight: 500;
}

.button_productoption button:hover{
	background: #377DFF;
	border-color: #377DFF;
}

.button_productoption button:focus{
	background: #377DFF;
	border-color: #377DFF;
	box-shadow: none;
	outline: none;
}

.button_productoption button:active{
	background: #377DFF;
	border-color: #377DFF;
	box-shadow: none;
	outline: none;
}

@media (min-width: 576px){
.modal-dialog {
    max-width: 700px;
}
}

.modal-header {
    padding: 25px;
    border-bottom: 0px;
    padding-bottom: 0px;
}

.modal-body {
    padding: 25px;
}

.add_new-option{
	font-size: 20px;
	line-height: 24px;
	color: #1C2B4B;
	font-weight: 600;
}

.add_more-options label{
	font-weight: 500;
	font-size: 16px;
	line-height: 22px;
	color: #1C2B4B;
}

.add_more-options input{
    height: 44px;
    border-radius: 12px;
    font-size: 16px;
    padding: 20px 10px 20px 20px;
}

.add_more-options select{
    height: 44px !important;
    border-radius: 12px;
    font-size: 16px;
    color: #1C2B4B;
}

.add_more-options input::placeholder{
	color: #8A94AB;
}

.edit_new-option{
	font-size: 20px;
	line-height: 24px;
	color: #1C2B4B;
	font-weight: 600;
}

.edit_more-options label{
	font-weight: 500;
	font-size: 16px;
	line-height: 22px;
	color: #1C2B4B;
}

.edit_more-options input{
    height: 44px;
    border-radius: 12px;
    font-size: 16px;
    padding: 20px 10px 20px 20px;
}

.edit_more-options select{
    height: 44px !important;
    border-radius: 12px;
    font-size: 16px;
    color: #1C2B4B;
}

.edit_more-options input::placeholder{
	color: #8A94AB;
}

.submit_wraps {
    border-top: 1px solid #DFE1E5;
    padding-top: 25px;
    margin-top: 20px;
}

.submit_wraps button{
	font-size: 14px;
    line-height: 20px;
    font-weight: 500;
    width: 139px;
    height: 44px;
    background: #377DFF;
    border-radius: 8px;
    border-color: #377DFF;
}

.submit_wraps button:hover{
    background: #377DFF;
    border-color: #377DFF;
}

.submit_wraps button:focus{
    background: #377DFF;
    border-color: #377DFF;
    outline: none;
    box-shadow: none;
}

.submit_wraps button:active{
    background: #377DFF;
    border-color: #377DFF;
    outline: none;
    box-shadow: none;
}

form.add_more-options {
    border-top: 1px solid #DFE1E5;
    padding-top: 20px;
}

form.edit_more-options {
    border-top: 1px solid #DFE1E5;
    padding-top: 20px;
}


.modal-content {
    box-shadow: 0px 0px 0px 1px rgb(63 63 68 / 5%), 0px 1px 3px rgb(63 63 68 / 15%);
    border-radius: 10px;
}


p.text-left {
    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
    color: #1C2B4B;
}

.text_preview{
	font-size: 20px;
	line-height: 24px;
	color: #377DFF;
}

.first_wrap_section {
    padding: 20px 0px;
}

</style>