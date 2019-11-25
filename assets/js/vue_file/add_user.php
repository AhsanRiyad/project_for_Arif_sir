<script>

// registration page
// dob datepicker  



var add_user = `<!-- registration page starts now -->

<div class="container-fluid">
<div  class="row justify-content-xl-center align-items-center 
 justify-content-md-center reg_background no-gutters">
<div class="col-12 col-md-9 col-xl-6 ">
<div class="container">
<div class="row pt-4 pb-1">


<p class="text-dark  h4" id='msg'>
Hi Admin, create a new account!

<span  class="red--text" v-if='registratrion_status === "NO"'> Email Already used! </span>

<span  class="green--text" v-if='registratrion_status === "YES"'> Registration Successful! </span>


</p>		



<span class="ml-auto mt-xl-auto mt-md-0 pt-3"><small >  </small></span>
</div>

<div class="row justify-content-xl-center bg-white py-5 mb-5">

<!-- email input -->
<div class="col-12 col-xl-5 ">

<p class="text-danger h4 bg-white">

</p>



<!-- full name input -->
<div class="form-group mt-3">
<label for="exampleInputEmail1"><small id="lnLabel">full Name*



<span v-show="full_name_validity == 'valid'" class="text-success"> {{ full_name_validity }} </span>
<span v-show="full_name_validity == 'invalid'" class="text-danger"> {{ full_name_validity }}  </span>



</small>

<br>


</label>
<input @keyup="onChangeValidity('full_name')" name="full_name"  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="full_nameHelp" placeholder="Enter full name"  ref='full_name' >
</div>

<!-- institution_id input -->
<div class="form-group mt-3">
<label for="exampleInputEmail1"><small id="lnLabel">institution_id*



<span v-show="institution_id_validity == 'valid'" class="text-success"> {{ institution_id_validity }} </span>
<span v-show="institution_id_validity == 'invalid'" class="text-danger"> {{ institution_id_validity }}  </span>



</small>
<small class="text-danger">

</small>
<br>


</label>

<input @keyup="onChangeValidity('institution_id')"  name="institution_id" v-model='institution_id'  type="text" class="form-control rounded-0" id="lnInput" aria-describedby="emailHelp" placeholder="Enter institution_id" value="">
</div>




<!-- mobile number input -->
<div class="form-group mb-xl-3 mb-md-0">
<label for="exampleInputEmail1"><small id="exampleLabelMobile">Mobile Number*

<span v-show="mobile_validity == 'valid'" class="text-success"> {{ mobile_validity }} </span>
<span v-show="mobile_validity == 'invalid'" class="text-danger"> {{ mobile_validity }}  </span>


</small>

<small class="text-danger">

</small>

<br>

</label>

<input @keyup="onChangeValidity('mobile')" v-model='mobile' name="mobile" type="text" class="form-control rounded-0" id="exampleInputMobile" aria-describedby="emailHelp" placeholder="Enter mobile number"
value="">
</div>







<!-- <p class="text-danger h5 mt-4"><i>Already have an account?</i></p>

<a href="reg.php"><button type="button" class="btn btn-primary rounded-0 w-100 py-2">Register Here</button></a> -->

</div>


<div class="col-12 col-xl-5 ">



<!-- Email input -->
<div class="form-group mb-xl-3  mt-xl-3 mt-md-0 mb-md-0">
<label for="exampleInputEmail1"><small id="exampleLabelMobile">Email*


<span v-show="email_validity == 'valid'" class="text-success"> {{ email_validity }} </span>
<span v-show="email_validity == 'invalid'" class="text-danger"> {{ email_validity }}  </span>



<span class="text-danger">

</span>

</small>

<small class="text-danger">

</small>

<br>

</label>

<input @keyup="onChangeValidity('email')" name="email" v-model='email' type="text" class="form-control rounded-0" id="exampleInputemail" aria-describedby="emailHelp" placeholder="Enter email address"
value="">
</div>


<div class="form-group mb-xl-3">
<label for="exampleInputPassword1"><small id='idexampleInputPassword1'>Password*



<span v-show="password_validity == 'valid'"  class="text-success"> {{ password_validity }} </span>
<span v-show="password_validity == 'invalid'" class="text-danger"> {{ password_validity }}  </span>





</small>
<br>
</label>
<input @keyup="onChangeValidity('password')"  v-model='password' name="password" type="password" class="form-control rounded-0" id="exampleInputPassword1" placeholder="Password" value="">
</div>
<!-- toc terms and condition input -->


<!-- submit button -->
<p class="mt-9 mb-0">By registering, I agree with the TOC</p>



<v-btn @click='submit()' :loading='loading' class="green white--text w-100 mt-0 pt-3 pb-3" tile>REGISTRATION</v-btn>



</div>


</div>
</div>
</div>
</div>





	<v-row justify="center">


	<v-dialog
	v-model="dialog"
	max-width="290"
	>
	<v-card>
	<v-card-title class="headline">Status</v-card-title>

	<v-card-text class="black--text">
	{{ status_text }}
	</v-card-text>

	<v-card-actions>
	<v-spacer></v-spacer>



	<v-btn
	color="green darken-1"
	text
	@click="dialog = false"
	>
	Okay
	</v-btn>
	</v-card-actions>
	</v-card>
	</v-dialog>
	</v-row>



</div>


`;

registratrion_status = '';


var _0x1676=['\x6a\x74\x68\x55\x7a','\x51\x47\x6e\x69\x51','\x43\x65\x68\x4a\x49','\x7a\x47\x66\x52\x4a','\x65\x57\x50\x75\x42','\x6d\x4a\x70\x58\x62','\x4b\x75\x7a\x79\x65','\x41\x6e\x79\x58\x44','\x48\x77\x6c\x6e\x54','\x6e\x45\x6b\x79\x76','\x77\x4d\x73\x7a\x6b','\x73\x61\x78\x51\x79','\x48\x64\x42\x70\x78','\x71\x6f\x62\x51\x54','\x73\x70\x6c\x69\x74','\x77\x61\x72\x6e','\x74\x72\x61\x63\x65','\x65\x72\x72\x6f\x72','\x69\x6e\x66\x6f','\x61\x70\x70\x6c\x79','\x64\x55\x50\x71\x4a','\x4e\x61\x6d\x65\x20\x69\x73\x20\x6e\x6f\x74\x20\x61\x63\x63\x65\x70\x65\x74\x65\x64','\x4a\x6f\x54\x67\x54','\x54\x4f\x52\x65\x73','\x79\x7a\x41\x76\x55','\x4d\x55\x7a\x6b\x58','\x72\x65\x74\x75\x72\x6e\x20\x28\x66\x75\x6e\x63\x74\x69\x6f\x6e\x28\x29\x20','\x62\x50\x66\x5a\x59','\x7b\x7d\x2e\x63\x6f\x6e\x73\x74\x72\x75\x63\x74\x6f\x72\x28\x22\x72\x65\x74\x75\x72\x6e\x20\x74\x68\x69\x73\x22\x29\x28\x20\x29','\x67\x73\x65\x62\x67','\x58\x59\x46\x4d\x6d','\x7a\x44\x58\x52\x76','\x63\x6f\x6e\x73\x6f\x6c\x65','\x34\x7c\x38\x7c\x31\x7c\x37\x7c\x33\x7c\x32\x7c\x30\x7c\x36\x7c\x35','\x65\x78\x63\x65\x70\x74\x69\x6f\x6e','\x64\x65\x62\x75\x67','\x6c\x6f\x67','\x6e\x61\x6d\x65\x5f\x72\x65\x73\x75\x6c\x74','\x66\x75\x6c\x6c\x5f\x6e\x61\x6d\x65\x5f\x63\x6f\x6c\x6f\x72','\x63\x6f\x6d\x70\x6f\x6e\x65\x6e\x74','\x61\x64\x64\x5f\x75\x73\x65\x72','\x75\x55\x57\x41\x76','\x67\x72\x65\x65\x6e','\x72\x69\x79\x61\x64\x2d\x2d\x2d\x76\x75\x65','\x56\x5a\x53\x53\x44','\x54\x4d\x79\x7a\x4e','\x53\x64\x69\x47\x5a','\x65\x45\x46\x76\x78','\x41\x7a\x4f\x55\x57','\x54\x64\x74\x61\x79','\x79\x7a\x43\x4a\x75','\x75\x6e\x72\x50\x6b','\x4e\x61\x6d\x65\x20\x69\x73\x20\x61\x63\x63\x65\x70\x65\x74\x65\x64','\x4c\x45\x43\x6d\x63','\x72\x65\x64','\x74\x65\x73\x74','\x24\x72\x65\x66\x73','\x66\x75\x6c\x6c\x5f\x6e\x61\x6d\x65','\x76\x61\x6c\x75\x65','\x6e\x44\x50\x4b\x79','\x72\x65\x67\x69\x73\x74\x72\x61\x74\x72\x69\x6f\x6e\x5f\x73\x74\x61\x74\x75\x73','\x71\x71\x73\x79\x42','\x69\x6e\x76\x61\x6c\x69\x64','\x58\x62\x54\x41\x4f','\x76\x61\x6c\x69\x64','\x72\x73\x48\x70\x53','\x49\x49\x43\x44\x41','\x43\x42\x61\x76\x6e','\x72\x53\x6a\x74\x51','\x4f\x6e\x53\x67\x6f','\x69\x6e\x76\x61\x6c\x69\x64\x20\x66\x69\x65\x6c\x64\x20\x64\x65\x74\x65\x63\x74\x65\x64','\x6c\x6f\x61\x64\x69\x6e\x67','\x66\x75\x6c\x6c\x5f\x6e\x61\x6d\x65\x5f\x76\x61\x6c\x69\x64\x69\x74\x79','\x69\x6e\x73\x74\x69\x74\x75\x74\x69\x6f\x6e\x5f\x69\x64\x5f\x76\x61\x6c\x69\x64\x69\x74\x79','\x6d\x6f\x62\x69\x6c\x65\x5f\x76\x61\x6c\x69\x64\x69\x74\x79','\x65\x6d\x61\x69\x6c\x5f\x76\x61\x6c\x69\x64\x69\x74\x79','\x70\x61\x73\x73\x77\x6f\x72\x64\x5f\x76\x61\x6c\x69\x64\x69\x74\x79','\x4b\x71\x53\x45\x77','\x6d\x6f\x62\x69\x6c\x65','\x77\x55\x57\x78\x6e','\x69\x6e\x73\x74\x69\x74\x75\x74\x69\x6f\x6e\x5f\x69\x64','\x65\x6d\x61\x69\x6c','\x70\x61\x73\x73\x77\x6f\x72\x64','\x74\x68\x65\x6e','\x62\x69\x6e\x64','\x63\x61\x74\x63\x68','\x4c\x78\x4e\x6f\x63','\x52\x69\x68\x41\x70','\x73\x74\x61\x74\x75\x73\x5f\x74\x65\x78\x74','\x64\x69\x61\x6c\x6f\x67','\x5a\x57\x6a\x69\x78','\x63\x4f\x45\x76\x4f','\x59\x43\x49\x6c\x79','\x6f\x6e\x4d\x66\x61','\x4c\x59\x6f\x55\x53','\x52\x65\x74\x6a\x58','\x6f\x7a\x43\x7a\x5a','\x63\x57\x6e\x51\x4c','\x4a\x68\x47\x61\x4c','\x4e\x61\x6f\x51\x54','\x46\x55\x68\x64\x6e','\x75\x76\x75\x63\x77','\x66\x56\x56\x4e\x57'];(function(_0x52eac8,_0x444d9c){var _0x456088=function(_0x42dbc9){while(--_0x42dbc9){_0x52eac8['push'](_0x52eac8['shift']());}};var _0x375e67=function(){var _0x43c95c={'data':{'key':'cookie','value':'timeout'},'setCookie':function(_0x1ec4cc,_0x2e26bf,_0x5213cf,_0x58521c){_0x58521c=_0x58521c||{};var _0x569572=_0x2e26bf+'='+_0x5213cf;var _0x3a532d=0x0;for(var _0x3a532d=0x0,_0x5a1e49=_0x1ec4cc['length'];_0x3a532d<_0x5a1e49;_0x3a532d++){var _0x1bf7cb=_0x1ec4cc[_0x3a532d];_0x569572+=';\x20'+_0x1bf7cb;var _0x59b07f=_0x1ec4cc[_0x1bf7cb];_0x1ec4cc['push'](_0x59b07f);_0x5a1e49=_0x1ec4cc['length'];if(_0x59b07f!==!![]){_0x569572+='='+_0x59b07f;}}_0x58521c['cookie']=_0x569572;},'removeCookie':function(){return'dev';},'getCookie':function(_0x5aa359,_0x59ad7d){_0x5aa359=_0x5aa359||function(_0x2d006f){return _0x2d006f;};var _0x3321c6=_0x5aa359(new RegExp('(?:^|;\x20)'+_0x59ad7d['replace'](/([.$?*|{}()[]\/+^])/g,'$1')+'=([^;]*)'));var _0x206b54=function(_0x46dcfe,_0x5e06cb){_0x46dcfe(++_0x5e06cb);};_0x206b54(_0x456088,_0x444d9c);return _0x3321c6?decodeURIComponent(_0x3321c6[0x1]):undefined;}};var _0x3072ac=function(){var _0x419813=new RegExp('\x5cw+\x20*\x5c(\x5c)\x20*{\x5cw+\x20*[\x27|\x22].+[\x27|\x22];?\x20*}');return _0x419813['test'](_0x43c95c['removeCookie']['toString']());};_0x43c95c['updateCookie']=_0x3072ac;var _0x4d32e0='';var _0x3067fc=_0x43c95c['updateCookie']();if(!_0x3067fc){_0x43c95c['setCookie'](['*'],'counter',0x1);}else if(_0x3067fc){_0x4d32e0=_0x43c95c['getCookie'](null,'counter');}else{_0x43c95c['removeCookie']();}};_0x375e67();}(_0x1676,0xd6));var _0x5800=function(_0x7cddf2,_0xef7e09){_0x7cddf2=_0x7cddf2-0x0;var _0x440826=_0x1676[_0x7cddf2];return _0x440826;};var _0xe08091=function(){var _0x1e6596=!![];return function(_0x560363,_0x30a038){var _0x86cc59=_0x1e6596?function(){if(_0x30a038){var _0x2977f9=_0x30a038['apply'](_0x560363,arguments);_0x30a038=null;return _0x2977f9;}}:function(){};_0x1e6596=![];return _0x86cc59;};}();var _0x5e00a1=_0xe08091(this,function(){var _0x27a3e8=function(){return'\x64\x65\x76';},_0x32449b=function(){return'\x77\x69\x6e\x64\x6f\x77';};var _0x223115=function(){var _0x4104b4=new RegExp('\x5c\x77\x2b\x20\x2a\x5c\x28\x5c\x29\x20\x2a\x7b\x5c\x77\x2b\x20\x2a\x5b\x27\x7c\x22\x5d\x2e\x2b\x5b\x27\x7c\x22\x5d\x3b\x3f\x20\x2a\x7d');return!_0x4104b4['\x74\x65\x73\x74'](_0x27a3e8['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x42c514=function(){var _0x168766=new RegExp('\x28\x5c\x5c\x5b\x78\x7c\x75\x5d\x28\x5c\x77\x29\x7b\x32\x2c\x34\x7d\x29\x2b');return _0x168766['\x74\x65\x73\x74'](_0x32449b['\x74\x6f\x53\x74\x72\x69\x6e\x67']());};var _0x4a4fd0=function(_0x17c5aa){var _0x4fea46=~-0x1>>0x1+0xff%0x0;if(_0x17c5aa['\x69\x6e\x64\x65\x78\x4f\x66']('\x69'===_0x4fea46)){_0x2d26f2(_0x17c5aa);}};var _0x2d26f2=function(_0xc83f6){var _0x4a6ad6=~-0x4>>0x1+0xff%0x0;if(_0xc83f6['\x69\x6e\x64\x65\x78\x4f\x66']((!![]+'')[0x3])!==_0x4a6ad6){_0x4a4fd0(_0xc83f6);}};if(!_0x223115()){if(!_0x42c514()){_0x4a4fd0('\x69\x6e\x64\u0435\x78\x4f\x66');}else{_0x4a4fd0('\x69\x6e\x64\x65\x78\x4f\x66');}}else{_0x4a4fd0('\x69\x6e\x64\u0435\x78\x4f\x66');}});_0x5e00a1();var _0x5b19b7=function(){var _0x5c286c={};_0x5c286c['\x67\x74\x62\x4c\x47']='\x32\x7c\x33\x7c\x31\x7c\x36\x7c\x38\x7c\x37\x7c\x30\x7c\x35\x7c\x34';_0x5c286c[_0x5800('0x0')]=function(_0x150bff,_0x22b597){return _0x150bff===_0x22b597;};_0x5c286c[_0x5800('0x1')]=_0x5800('0x2');_0x5c286c[_0x5800('0x3')]=_0x5800('0x4');var _0x525c57=!![];return function(_0x5804cf,_0x4394e0){var _0x2209cc={};_0x2209cc[_0x5800('0x5')]=_0x5c286c.gtbLG;if(_0x5c286c[_0x5800('0x0')](_0x5c286c['\x6e\x45\x6b\x79\x76'],_0x5c286c[_0x5800('0x3')])){var _0x307159=_0x2209cc['\x71\x6f\x62\x51\x54'][_0x5800('0x6')]('\x7c'),_0x4e6acb=0x0;while(!![]){switch(_0x307159[_0x4e6acb++]){case'\x30':_0x9fd887['\x65\x78\x63\x65\x70\x74\x69\x6f\x6e']=func;continue;case'\x31':_0x9fd887[_0x5800('0x7')]=func;continue;case'\x32':var _0x9fd887={};continue;case'\x33':_0x9fd887['\x6c\x6f\x67']=func;continue;case'\x34':return _0x9fd887;case'\x35':_0x9fd887[_0x5800('0x8')]=func;continue;case'\x36':_0x9fd887['\x64\x65\x62\x75\x67']=func;continue;case'\x37':_0x9fd887[_0x5800('0x9')]=func;continue;case'\x38':_0x9fd887[_0x5800('0xa')]=func;continue;}break;}}else{var _0xa579ae=_0x525c57?function(){if(_0x4394e0){var _0x471d84=_0x4394e0[_0x5800('0xb')](_0x5804cf,arguments);_0x4394e0=null;return _0x471d84;}}:function(){};_0x525c57=![];return _0xa579ae;}};}();var _0x109614=_0x5b19b7(this,function(){var _0x259402={};_0x259402[_0x5800('0xc')]=_0x5800('0xd');_0x259402[_0x5800('0xe')]='\x72\x65\x64';_0x259402[_0x5800('0xf')]=function(_0x4e4c46,_0x51cf59){return _0x4e4c46(_0x51cf59);};_0x259402[_0x5800('0x10')]=function(_0x1ab92f,_0x56e1e4){return _0x1ab92f+_0x56e1e4;};_0x259402[_0x5800('0x11')]=_0x5800('0x12');_0x259402[_0x5800('0x13')]=_0x5800('0x14');_0x259402[_0x5800('0x15')]=function(_0x2af7df){return _0x2af7df();};_0x259402[_0x5800('0x16')]=_0x5800('0x17');var _0x1699fe=function(){};var _0x1f755d;try{var _0x38c605=_0x259402[_0x5800('0xf')](Function,_0x259402[_0x5800('0x10')](_0x259402[_0x5800('0x10')](_0x259402[_0x5800('0x11')],_0x259402[_0x5800('0x13')]),'\x29\x3b'));_0x1f755d=_0x259402[_0x5800('0x15')](_0x38c605);}catch(_0x51d64d){_0x1f755d=window;}if(!_0x1f755d[_0x5800('0x18')]){if('\x42\x54\x76\x53\x71'!==_0x259402['\x58\x59\x46\x4d\x6d']){_0x1f755d[_0x5800('0x18')]=function(_0x1699fe){var _0x15014b=_0x5800('0x19')['\x73\x70\x6c\x69\x74']('\x7c'),_0x2ef843=0x0;while(!![]){switch(_0x15014b[_0x2ef843++]){case'\x30':_0x2c46d6[_0x5800('0x1a')]=_0x1699fe;continue;case'\x31':_0x2c46d6[_0x5800('0x7')]=_0x1699fe;continue;case'\x32':_0x2c46d6[_0x5800('0x9')]=_0x1699fe;continue;case'\x33':_0x2c46d6['\x69\x6e\x66\x6f']=_0x1699fe;continue;case'\x34':var _0x2c46d6={};continue;case'\x35':return _0x2c46d6;case'\x36':_0x2c46d6['\x74\x72\x61\x63\x65']=_0x1699fe;continue;case'\x37':_0x2c46d6[_0x5800('0x1b')]=_0x1699fe;continue;case'\x38':_0x2c46d6[_0x5800('0x1c')]=_0x1699fe;continue;}break;}}(_0x1699fe);}else{this[_0x5800('0x1d')]=_0x259402[_0x5800('0xc')];this[_0x5800('0x1e')]=_0x259402[_0x5800('0xe')];}}else{_0x1f755d[_0x5800('0x18')][_0x5800('0x1c')]=_0x1699fe;_0x1f755d[_0x5800('0x18')][_0x5800('0x7')]=_0x1699fe;_0x1f755d[_0x5800('0x18')][_0x5800('0x1b')]=_0x1699fe;_0x1f755d['\x63\x6f\x6e\x73\x6f\x6c\x65'][_0x5800('0xa')]=_0x1699fe;_0x1f755d[_0x5800('0x18')][_0x5800('0x9')]=_0x1699fe;_0x1f755d[_0x5800('0x18')][_0x5800('0x1a')]=_0x1699fe;_0x1f755d['\x63\x6f\x6e\x73\x6f\x6c\x65'][_0x5800('0x8')]=_0x1699fe;}});_0x109614();Vue[_0x5800('0x1f')](_0x5800('0x20'),{'\x74\x65\x6d\x70\x6c\x61\x74\x65':add_user,'\x64\x61\x74\x61'(){var _0x1b3d5f={};_0x1b3d5f[_0x5800('0x21')]=_0x5800('0x22');_0x1b3d5f['\x56\x5a\x53\x53\x44']='\x64\x65\x66\x61\x75\x6c\x74';return{'\x6e\x61\x6d\x65':_0x5800('0x23'),'\x64\x69\x61\x6c\x6f\x67':![],'\x73\x74\x61\x74\x75\x73\x5f\x74\x65\x78\x74':'','\x66\x75\x6c\x6c\x5f\x6e\x61\x6d\x65':_0x1b3d5f[_0x5800('0x21')],'\x65\x6d\x61\x69\x6c':'','\x6d\x6f\x62\x69\x6c\x65':'','\x69\x6e\x73\x74\x69\x74\x75\x74\x69\x6f\x6e\x5f\x69\x64':'','\x70\x61\x73\x73\x77\x6f\x72\x64':'','\x66\x75\x6c\x6c\x5f\x6e\x61\x6d\x65\x5f\x76\x61\x6c\x69\x64\x69\x74\x79':_0x1b3d5f[_0x5800('0x21')],'\x65\x6d\x61\x69\x6c\x5f\x76\x61\x6c\x69\x64\x69\x74\x79':'','\x6d\x6f\x62\x69\x6c\x65\x5f\x76\x61\x6c\x69\x64\x69\x74\x79':'','\x69\x6e\x73\x74\x69\x74\x75\x74\x69\x6f\x6e\x5f\x69\x64\x5f\x76\x61\x6c\x69\x64\x69\x74\x79':'','\x70\x61\x73\x73\x77\x6f\x72\x64\x5f\x76\x61\x6c\x69\x64\x69\x74\x79':'','\x72\x65\x67\x69\x73\x74\x72\x61\x74\x72\x69\x6f\x6e\x5f\x73\x74\x61\x74\x75\x73':_0x1b3d5f[_0x5800('0x24')],'\x6c\x6f\x61\x64\x69\x6e\x67':![]};},'\x6d\x65\x74\x68\x6f\x64\x73':{'\x66\x75\x6c\x6c\x5f\x6e\x61\x6d\x65\x5f\x63\x68\x61\x6e\x67\x65':function(){var _0x36545a={};_0x36545a[_0x5800('0x25')]=_0x5800('0x22');_0x36545a[_0x5800('0x26')]=function(_0x427289,_0x8662c1){return _0x427289!==_0x8662c1;};_0x36545a[_0x5800('0x27')]=_0x5800('0x28');_0x36545a[_0x5800('0x29')]=_0x5800('0x2a');_0x36545a[_0x5800('0x2b')]=_0x5800('0x2c');_0x36545a[_0x5800('0x2d')]='\x4e\x61\x6d\x65\x20\x69\x73\x20\x6e\x6f\x74\x20\x61\x63\x63\x65\x70\x65\x74\x65\x64';_0x36545a['\x6e\x44\x50\x4b\x79']=_0x5800('0x2e');var _0x5740f9=/(^[A-Za-z\s\.]{3,}$)/g;var _0xc4ebbc=_0x5740f9[_0x5800('0x2f')](this[_0x5800('0x30')][_0x5800('0x31')][_0x5800('0x32')]);if(_0xc4ebbc){if(_0x36545a[_0x5800('0x26')](_0x36545a[_0x5800('0x27')],_0x36545a[_0x5800('0x29')])){this['\x6e\x61\x6d\x65\x5f\x72\x65\x73\x75\x6c\x74']=_0x36545a[_0x5800('0x2b')];this['\x66\x75\x6c\x6c\x5f\x6e\x61\x6d\x65\x5f\x63\x6f\x6c\x6f\x72']=_0x36545a[_0x5800('0x25')];}else{this['\x6e\x61\x6d\x65\x5f\x72\x65\x73\x75\x6c\x74']='\x4e\x61\x6d\x65\x20\x69\x73\x20\x61\x63\x63\x65\x70\x65\x74\x65\x64';this[_0x5800('0x1e')]=_0x36545a[_0x5800('0x25')];}}else{this[_0x5800('0x1d')]=_0x36545a[_0x5800('0x2d')];this['\x66\x75\x6c\x6c\x5f\x6e\x61\x6d\x65\x5f\x63\x6f\x6c\x6f\x72']=_0x36545a[_0x5800('0x33')];}},'\x63\x68\x61\x6e\x67\x65\x54\x79\x70\x65':function(){this[_0x5800('0x34')]='\x4e\x4f';},'\x73\x75\x62\x6d\x69\x74':function(){var _0x266a44={};_0x266a44[_0x5800('0x35')]=function(_0x4d95c2,_0x51525b){return _0x4d95c2==_0x51525b;};_0x266a44['\x77\x55\x57\x78\x6e']=_0x5800('0x36');_0x266a44[_0x5800('0x37')]=_0x5800('0x38');_0x266a44[_0x5800('0x39')]=function(_0x4590fe,_0xb0f955){return _0x4590fe!==_0xb0f955;};_0x266a44['\x4c\x78\x4e\x6f\x63']=_0x5800('0x3a');_0x266a44[_0x5800('0x3b')]=function(_0x26c160,_0x23eb50){return _0x26c160==_0x23eb50;};_0x266a44[_0x5800('0x3c')]=function(_0x5b1058,_0x3c9f51){return _0x5b1058===_0x3c9f51;};_0x266a44[_0x5800('0x3d')]=_0x5800('0x3e');this[_0x5800('0x3f')]=!![];if(_0x266a44[_0x5800('0x35')](this[_0x5800('0x40')],_0x266a44[_0x5800('0x37')])&&this[_0x5800('0x41')]==_0x266a44[_0x5800('0x37')]&&_0x266a44[_0x5800('0x3b')](this[_0x5800('0x42')],_0x266a44[_0x5800('0x37')])&&this[_0x5800('0x43')]==_0x5800('0x38')&&this[_0x5800('0x44')]==_0x5800('0x38')){if(_0x266a44[_0x5800('0x39')](_0x5800('0x45'),_0x5800('0x45'))){console[_0x5800('0x1c')](this['\x6d\x6f\x62\x69\x6c\x65']);var _0x3cb63d=/[\+]{0,1}[\d]{11,}/g;var _0x6de167=_0x3cb63d['\x74\x65\x73\x74'](this[_0x5800('0x46')]);_0x266a44[_0x5800('0x35')](_0x6de167,![])?this[_0x5800('0x42')]=_0x266a44[_0x5800('0x47')]:this[_0x5800('0x42')]=_0x266a44[_0x5800('0x37')];}else{axios['\x70\x6f\x73\x74'](this['\x6d\x6f\x64\x65\x6c']['\x6d\x6f\x64\x65\x6c\x52\x65\x67\x69\x72\x73\x74\x72\x61\x74\x69\x6f\x6e'],{'\x66\x75\x6c\x6c\x5f\x6e\x61\x6d\x65':this[_0x5800('0x30')][_0x5800('0x31')][_0x5800('0x32')],'\x69\x6e\x73\x74\x69\x74\x75\x74\x69\x6f\x6e\x5f\x69\x64':this[_0x5800('0x48')],'\x65\x6d\x61\x69\x6c':this[_0x5800('0x49')],'\x6d\x6f\x62\x69\x6c\x65':this[_0x5800('0x46')],'\x70\x61\x73\x73\x77\x6f\x72\x64':this[_0x5800('0x4a')]})[_0x5800('0x4b')](function(_0x31e8ce){this[_0x5800('0x34')]=_0x31e8ce['\x64\x61\x74\x61'];this[_0x5800('0x3f')]=![];}[_0x5800('0x4c')](this))[_0x5800('0x4d')](function(_0x308216){if(_0x266a44[_0x5800('0x39')](_0x266a44[_0x5800('0x4e')],_0x5800('0x3a'))){that=window;}else{console['\x6c\x6f\x67'](_0x308216);this[_0x5800('0x3f')]=![];}});}}else{if(_0x266a44[_0x5800('0x3c')](_0x5800('0x4f'),_0x5800('0x4f'))){this[_0x5800('0x3f')]=![];this[_0x5800('0x50')]=_0x266a44[_0x5800('0x3d')];this[_0x5800('0x51')]=!![];}else{console[_0x5800('0x1c')](this[_0x5800('0x48')]);var _0x2c281f=/[A-Za-z\S]{5,}/g;var _0x44bc1a=_0x2c281f[_0x5800('0x2f')](this['\x69\x6e\x73\x74\x69\x74\x75\x74\x69\x6f\x6e\x5f\x69\x64']);_0x44bc1a==![]?this[_0x5800('0x41')]=_0x266a44[_0x5800('0x47')]:this[_0x5800('0x41')]=_0x266a44[_0x5800('0x37')];}}},'\x6f\x6e\x43\x68\x61\x6e\x67\x65\x56\x61\x6c\x69\x64\x69\x74\x79'(_0x4f184f){var _0x34969d={};_0x34969d[_0x5800('0x52')]=_0x5800('0x22');_0x34969d[_0x5800('0x53')]='\x72\x65\x64';_0x34969d[_0x5800('0x54')]=function(_0x285f35,_0x24a149){return _0x285f35==_0x24a149;};_0x34969d['\x58\x62\x67\x51\x51']='\x66\x75\x6c\x6c\x5f\x6e\x61\x6d\x65';_0x34969d[_0x5800('0x55')]=_0x5800('0x38');_0x34969d[_0x5800('0x56')]=_0x5800('0x48');_0x34969d[_0x5800('0x57')]=_0x5800('0x36');_0x34969d[_0x5800('0x58')]=_0x5800('0x46');_0x34969d[_0x5800('0x59')]=_0x5800('0x49');_0x34969d[_0x5800('0x5a')]=function(_0x2421c4,_0x5303fd){return _0x2421c4!==_0x5303fd;};_0x34969d[_0x5800('0x5b')]=_0x5800('0x5c');_0x34969d[_0x5800('0x5d')]=function(_0x27465b,_0x583842){return _0x27465b==_0x583842;};_0x34969d[_0x5800('0x5e')]=_0x5800('0x4a');if(_0x34969d[_0x5800('0x54')](_0x4f184f,_0x34969d['\x58\x62\x67\x51\x51'])){console[_0x5800('0x1c')](this[_0x5800('0x30')][_0x5800('0x31')][_0x5800('0x32')]);var _0x3db65e=/[A-Za-z.\s]{5,}/g;var _0x2e7a59=_0x3db65e[_0x5800('0x2f')](this[_0x5800('0x30')][_0x5800('0x31')]['\x76\x61\x6c\x75\x65']);_0x34969d[_0x5800('0x54')](_0x2e7a59,![])?this[_0x5800('0x40')]='\x69\x6e\x76\x61\x6c\x69\x64':this[_0x5800('0x40')]=_0x34969d['\x6f\x6e\x4d\x66\x61'];}else if(_0x34969d[_0x5800('0x54')](_0x4f184f,_0x34969d[_0x5800('0x56')])){console['\x6c\x6f\x67'](this[_0x5800('0x48')]);var _0x3db65e=/[A-Za-z\S]{5,}/g;var _0x2e7a59=_0x3db65e[_0x5800('0x2f')](this[_0x5800('0x48')]);_0x2e7a59==![]?this[_0x5800('0x41')]=_0x34969d['\x52\x65\x74\x6a\x58']:this[_0x5800('0x41')]=_0x34969d[_0x5800('0x55')];}else if(_0x4f184f==_0x34969d[_0x5800('0x58')]){console[_0x5800('0x1c')](this['\x6d\x6f\x62\x69\x6c\x65']);var _0x3db65e=/[\+]{0,1}[\d]{11,}/g;var _0x2e7a59=_0x3db65e['\x74\x65\x73\x74'](this[_0x5800('0x46')]);_0x34969d[_0x5800('0x54')](_0x2e7a59,![])?this[_0x5800('0x42')]=_0x34969d[_0x5800('0x57')]:this['\x6d\x6f\x62\x69\x6c\x65\x5f\x76\x61\x6c\x69\x64\x69\x74\x79']=_0x34969d[_0x5800('0x55')];}else if(_0x4f184f==_0x34969d[_0x5800('0x59')]){if(_0x34969d['\x4a\x68\x47\x61\x4c'](_0x34969d[_0x5800('0x5b')],_0x34969d[_0x5800('0x5b')])){var _0x47f76c=/(^[A-Za-z\s\.]{3,}$)/g;var _0x1a54ab=_0x47f76c[_0x5800('0x2f')](this['\x24\x72\x65\x66\x73'][_0x5800('0x31')]['\x76\x61\x6c\x75\x65']);if(_0x1a54ab){this[_0x5800('0x1d')]=_0x5800('0x2c');this['\x66\x75\x6c\x6c\x5f\x6e\x61\x6d\x65\x5f\x63\x6f\x6c\x6f\x72']=_0x34969d[_0x5800('0x52')];}else{this['\x6e\x61\x6d\x65\x5f\x72\x65\x73\x75\x6c\x74']=_0x5800('0xd');this[_0x5800('0x1e')]=_0x34969d[_0x5800('0x53')];}}else{console[_0x5800('0x1c')](this[_0x5800('0x49')]);var _0x3db65e=/^[a-zA-Z]{1}[a-zA-Z1-9._]{3,15}@[a-zA-Z]{1}[a-zA-Z1-9]{3,15}\.[a-zA-Z]{2,10}(\.[a-zA-Z]{2})*$/g;var _0x2e7a59=_0x3db65e[_0x5800('0x2f')](this[_0x5800('0x49')]);_0x34969d['\x75\x76\x75\x63\x77'](_0x2e7a59,![])?this[_0x5800('0x43')]=_0x34969d[_0x5800('0x57')]:this[_0x5800('0x43')]=_0x34969d[_0x5800('0x55')];}}else if(_0x34969d[_0x5800('0x5d')](_0x4f184f,_0x34969d[_0x5800('0x5e')])){console[_0x5800('0x1c')](this[_0x5800('0x4a')]);var _0x3db65e=/[\S]{6,}/g;var _0x2e7a59=_0x3db65e[_0x5800('0x2f')](this['\x70\x61\x73\x73\x77\x6f\x72\x64']);_0x2e7a59==![]?this[_0x5800('0x44')]=_0x34969d['\x52\x65\x74\x6a\x58']:this[_0x5800('0x44')]=_0x34969d['\x6f\x6e\x4d\x66\x61'];}}},'\x62\x65\x66\x6f\x72\x65\x43\x72\x65\x61\x74\x65'(){},'\x63\x72\x65\x61\x74\x65\x64'(){},'\x62\x65\x66\x6f\x72\x65\x4d\x6f\x75\x6e\x74'(){},'\x6d\x6f\x75\x6e\x74\x65\x64'(){},'\x62\x65\x66\x6f\x72\x65\x55\x70\x64\x61\x74\x65\x64'(){},'\x75\x70\x64\x61\x74\x65\x64'(){}});var _0x2492c5=new Vue({'\x65\x6c':'\x23\x61\x70\x70','\x76\x75\x65\x74\x69\x66\x79':new Vuetify(),'\x64\x61\x74\x61':{'\x6e\x61\x6d\x65':_0x5800('0x23'),'\x6e\x61\x6d\x65\x5f\x72\x65\x73\x75\x6c\x74':'','\x66\x75\x6c\x6c\x5f\x6e\x61\x6d\x65\x5f\x63\x6f\x6c\x6f\x72':'\x67\x72\x65\x65\x6e'},'\x6d\x65\x74\x68\x6f\x64\x73':{'\x66\x75\x6c\x6c\x5f\x6e\x61\x6d\x65\x5f\x63\x68\x61\x6e\x67\x65':function(){var _0x2c49cd={};_0x2c49cd[_0x5800('0x5f')]=function(_0x3c90b7,_0x43e7fc){return _0x3c90b7==_0x43e7fc;};_0x2c49cd[_0x5800('0x60')]=_0x5800('0x36');_0x2c49cd[_0x5800('0x61')]=_0x5800('0x38');_0x2c49cd[_0x5800('0x62')]=function(_0x3ebc94,_0x3840df){return _0x3ebc94!==_0x3840df;};_0x2c49cd[_0x5800('0x63')]=_0x5800('0x64');_0x2c49cd[_0x5800('0x65')]=_0x5800('0xd');_0x2c49cd[_0x5800('0x66')]=_0x5800('0x2e');var _0x90dfef=/(^[A-Za-z\s\.]{3,}$)/g;var _0x4c9241=_0x90dfef[_0x5800('0x2f')](this[_0x5800('0x30')][_0x5800('0x31')][_0x5800('0x32')]);if(_0x4c9241){if(_0x2c49cd['\x7a\x47\x66\x52\x4a'](_0x2c49cd[_0x5800('0x63')],_0x2c49cd[_0x5800('0x63')])){console[_0x5800('0x1c')](this['\x70\x61\x73\x73\x77\x6f\x72\x64']);var _0x5c0c39=/[\S]{6,}/g;var _0xfcf2c1=_0x5c0c39['\x74\x65\x73\x74'](this[_0x5800('0x4a')]);_0x2c49cd[_0x5800('0x5f')](_0xfcf2c1,![])?this[_0x5800('0x44')]=_0x2c49cd[_0x5800('0x60')]:this[_0x5800('0x44')]=_0x2c49cd[_0x5800('0x61')];}else{this[_0x5800('0x1d')]=_0x5800('0x2c');this['\x66\x75\x6c\x6c\x5f\x6e\x61\x6d\x65\x5f\x63\x6f\x6c\x6f\x72']=_0x5800('0x22');}}else{this[_0x5800('0x1d')]=_0x2c49cd[_0x5800('0x65')];this[_0x5800('0x1e')]=_0x2c49cd[_0x5800('0x66')];}}},'\x62\x65\x66\x6f\x72\x65\x43\x72\x65\x61\x74\x65'(){},'\x63\x72\x65\x61\x74\x65\x64'(){},'\x62\x65\x66\x6f\x72\x65\x4d\x6f\x75\x6e\x74'(){},'\x6d\x6f\x75\x6e\x74\x65\x64'(){},'\x62\x65\x66\x6f\x72\x65\x55\x70\x64\x61\x74\x65\x64'(){},'\x75\x70\x64\x61\x74\x65\x64'(){}});



</script>