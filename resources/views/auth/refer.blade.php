@extends('layouts.main')
@section('content')
 <div class="container" >
    <h3 class="h3style">Create your account</h3><br>
    <a class="h3style btn btn-success" href="{{ ('/') }}">Back Home</a>
    <br>   <br>
    <div class="row col-md-12">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
        <form class="form-horizontal col-md-12"  form method="POST" action="{{ route('register') }}" >
           @csrf
           <div class="form-group">
            @if ($message = Session::get('warning'))
              <div class="alert alert-warning">
                  <p style="color: red;">{{ $message }}</p>
              </div>
            @endif
          </div>
          <div class="form-group">
            <label>Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your Name">
                
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email address">
                
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>            
           <div class="form-group">
            <label for="email">Country</label>

            <select name="country" class="form-control" id="" required>
                   <option value="" > Select Country</option>
                <option data-countryCode="GB" value="US" >UK (+44)</option>
                <option data-countryCode="US" value="US">USA (+1)</option>
                <option data-countryCode="DZ" value="Algeria">Algeria (+213)</option>
                <option data-countryCode="AD" value="Andorra">Andorra (+376)</option>
                <option data-countryCode="AO" value="Angola">Angola (+244)</option>
                <option data-countryCode="AI" value="Anguilla">Anguilla (+1264)</option>
                <option data-countryCode="AG" value="Antigua">Antigua &amp; Barbuda (+1268)</option>
                <option data-countryCode="AR" value="Argentina">Argentina (+54)</option>
                <option data-countryCode="AM" value="Armenia">Armenia (+374)</option>
                <option data-countryCode="AW" value="Aruba">Aruba (+297)</option>
                <option data-countryCode="AU" value="Australia">Australia (+61)</option>
                <option data-countryCode="AT" value="Austria">Austria (+43)</option>
                <option data-countryCode="AZ" value="Azerbaijan">Azerbaijan (+994)</option>
                <option data-countryCode="BS" value="Bahamas">Bahamas (+1242)</option>
                <option data-countryCode="BH" value="Bahrain">Bahrain (+973)</option>
                <option data-countryCode="BD" value="Bangladesh">Bangladesh (+880)</option>
                <option data-countryCode="BB" value="Barbados">Barbados (+1246)</option>
                <option data-countryCode="BY" value="Belarus">Belarus (+375)</option>
                <option data-countryCode="BE" value="Belgium">Belgium (+32)</option>
                <option data-countryCode="BZ" value="Belize">Belize (+501)</option>
                <option data-countryCode="BJ" value="Benin">Benin (+229)</option>
                <option data-countryCode="BM" value="Bermuda">Bermuda (+1441)</option>
                <option data-countryCode="BT" value="Bhutan">Bhutan (+975)</option>
                <option data-countryCode="BO" value="Bolivia">Bolivia (+591)</option>
                <option data-countryCode="BA" value="Bosnia">Bosnia Herzegovina (+387)</option>
                <option data-countryCode="BW" value="Botswana">Botswana (+267)</option>
                <option data-countryCode="BR" value="Brazil">Brazil (+55)</option>
                <option data-countryCode="BN" value="Brunei">Brunei (+673)</option>
                <option data-countryCode="BG" value="Bulgaria">Bulgaria (+359)</option>
                <option data-countryCode="BF" value="Burkina">Burkina Faso (+226)</option>
                <option data-countryCode="BI" value="Burundi">Burundi (+257)</option>
                <option data-countryCode="KH" value="Cambodia">Cambodia (+855)</option>
                <option data-countryCode="CM" value="Cameroon">Cameroon (+237)</option>
                <option data-countryCode="CA" value="Canada">Canada (+1)</option>
                <option data-countryCode="CV" value="Cape Verde Islands">Cape Verde Islands (+238)</option>
                <option data-countryCode="KY" value="Cayman">Cayman Islands (+1345)</option>
                <option data-countryCode="CF" value="Central African Republic">Central African Republic (+236)</option>
                <option data-countryCode="CL" value="Chile">Chile (+56)</option>
                <option data-countryCode="CN" value="China">China (+86)</option>
                <option data-countryCode="CO" value="Colombia">Colombia (+57)</option>
                <option data-countryCode="KM" value="Comoros">Comoros (+269)</option>
                <option data-countryCode="CG" value="Congo">Congo (+242)</option>
                <option data-countryCode="CK" value="Cook Islands">Cook Islands (+682)</option>
                <option data-countryCode="CR" value="Costa Rica">Costa Rica (+506)</option>
                <option data-countryCode="HR" value="Croatia">Croatia (+385)</option>
                <option data-countryCode="CU" value="Cuba">Cuba (+53)</option>
                <option data-countryCode="CY" value="Cyprus North">Cyprus North (+90392)</option>
                <option data-countryCode="CY" value="Cyprus South">Cyprus South (+357)</option>
                <option data-countryCode="CZ" value="Czech Republic">Czech Republic (+42)</option>
                <option data-countryCode="DK" value="Denmark">Denmark (+45)</option>
                <option data-countryCode="DJ" value="Djibouti">Djibouti (+253)</option>
                <option data-countryCode="DM" value="Dominica">Dominica (+1809)</option>
                <option data-countryCode="DO" value="Dominican">Dominican Republic (+1809)</option>
                <option data-countryCode="EC" value="Ecuador">Ecuador (+593)</option>
                <option data-countryCode="EG" value="Egypt">Egypt (+20)</option>
                <option data-countryCode="SV" value="El Salvador ">El Salvador (+503)</option>
                <option data-countryCode="GQ" value="Equatorial Guinea">Equatorial Guinea (+240)</option>
                <option data-countryCode="ER" value="Eritrea">Eritrea (+291)</option>
                <option data-countryCode="EE" value="Estonia">Estonia (+372)</option>
                <option data-countryCode="ET" value="Ethiopia">Ethiopia (+251)</option>
                <option data-countryCode="FK" value="Falkland">Falkland Islands (+500)</option>
                <option data-countryCode="FO" value="Faroe">Faroe Islands (+298)</option>
                <option data-countryCode="FJ" value="Fiji">Fiji (+679)</option>
                <option data-countryCode="FI" value="Finland">Finland (+358)</option>
                <option data-countryCode="FR" value="France">France (+33)</option>
                <option data-countryCode="GF" value="French">French Guiana (+594)</option>
                <option data-countryCode="PF" value="French Polynesia">French Polynesia (+689)</option>
                <option data-countryCode="GA" value="Gabon">Gabon (+241)</option>
                <option data-countryCode="GM" value="Gambia">Gambia (+220)</option>
                <option data-countryCode="GE" value="Georgia">Georgia (+7880)</option>
                <option data-countryCode="DE" value="Germany"> (+49)</option>
                <option data-countryCode="GH" value="233">Ghana (+233)</option>
                <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                <option data-countryCode="GR" value="Greece">Greece (+30)</option>
                <option data-countryCode="GL" value="299">Greenland (+299)</option>
                <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                <option data-countryCode="GU" value="671">Guam (+671)</option>
                <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                <option data-countryCode="GN" value="224">Guinea (+224)</option>
                <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                <option data-countryCode="GY" value="592">Guyana (+592)</option>
                <option data-countryCode="HT" value="509">Haiti (+509)</option>
                <option data-countryCode="HN" value="504">Honduras (+504)</option>
                <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                <option data-countryCode="HU" value="36">Hungary (+36)</option>
                <option data-countryCode="IS" value="354">Iceland (+354)</option>
                <option data-countryCode="IN" value="India">India (+91)</option>
                <option data-countryCode="ID" value="Indonesia">Indonesia (+62)</option>
                <option data-countryCode="IR" value="98">Iran (+98)</option>
                <option data-countryCode="IQ" value="Iraq">Iraq (+964)</option>
                <option data-countryCode="IE" value="353">Ireland (+353)</option>
                <option data-countryCode="IL" value="972">Israel (+972)</option>
                <option data-countryCode="IT" value="39">Italy (+39)</option>
                <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                <option data-countryCode="JP" value="Japan">Japan (+81)</option>
                <option data-countryCode="JO" value="962">Jordan (+962)</option>
                <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                <option data-countryCode="KE" value="254">Kenya (+254)</option>
                <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                <option data-countryCode="KP" value="850">Korea North (+850)</option>
                <option data-countryCode="KR" value="82">Korea South (+82)</option>
                <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                <option data-countryCode="LA" value="856">Laos (+856)</option>
                <option data-countryCode="LV" value="371">Latvia (+371)</option>
                <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                <option data-countryCode="LR" value="231">Liberia (+231)</option>
                <option data-countryCode="LY" value="218">Libya (+218)</option>
                <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                <option data-countryCode="MO" value="853">Macao (+853)</option>
                <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                <option data-countryCode="MW" value="265">Malawi (+265)</option>
                <option data-countryCode="MY" value="Malaysia">Malaysia (+60)</option>
                <option data-countryCode="MV" value="960">Maldives (+960)</option>
                <option data-countryCode="ML" value="Mali">Mali (+223)</option>
                <option data-countryCode="MT" value="356">Malta (+356)</option>
                <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                <option data-countryCode="MX" value="52">Mexico (+52)</option>
                <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                <option data-countryCode="MD" value="373">Moldova (+373)</option>
                <option data-countryCode="MC" value="377">Monaco (+377)</option>
                <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                <option data-countryCode="MA" value="212">Morocco (+212)</option>
                <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                <option data-countryCode="MN" value="Myanmar">Myanmar (+95)</option>
                <option data-countryCode="NA" value="264">Namibia (+264)</option>
                <option data-countryCode="NR" value="674">Nauru (+674)</option>
                <option data-countryCode="NP" value="Nepal">Nepal (+977)</option>
                <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                <option data-countryCode="NE" value="227">Niger (+227)</option>
                <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                <option data-countryCode="NU" value="683">Niue (+683)</option>
                <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                <option data-countryCode="NO" value="Norway">Norway (+47)</option>
                <option data-countryCode="OM" value="Oman">Oman (+968)</option>
                <option data-countryCode="PW" value="680">Palau (+680)</option>
                <option data-countryCode="PA" value="507">Panama (+507)</option>
                <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                <option data-countryCode="PY" value="Pakistan">Pakistan (+595)</option>
                <option data-countryCode="PE" value="Peru">Peru (+51)</option>
                <option data-countryCode="PH" value="63">Philippines (+63)</option>
                <option data-countryCode="PL" value="48">Poland (+48)</option>
                <option data-countryCode="PT" value="351">Portugal (+351)</option>
                <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                <option data-countryCode="QA" value="Qatar">Qatar (+974)</option>
                <option data-countryCode="RE" value="Reunion">Reunion (+262)</option>
                <option data-countryCode="RO" value="Romania">Romania (+40)</option>
                <option data-countryCode="RU" value="Russia">Russia (+7)</option>
                <option data-countryCode="RW" value="Rwanda">Rwanda (+250)</option>
                <option data-countryCode="SM" value="San Marino ">San Marino (+378)</option>
                <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                <option data-countryCode="SA" value="Saudi Arabia">Saudi Arabia (+966)</option>
                <option data-countryCode="SN" value="221">Senegal (+221)</option>
                <option data-countryCode="CS" value="381">Serbia (+381)</option>
                <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                <option data-countryCode="SG" value="Singapore">Singapore (+65)</option>
                <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                <option data-countryCode="SO" value="Somalia">Somalia (+252)</option>
                <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                <option data-countryCode="ES" value="34">Spain (+34)</option>
                <option data-countryCode="LK" value="Sri">Sri Lanka (+94)</option>
                <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                <option data-countryCode="SD" value="249">Sudan (+249)</option>
                <option data-countryCode="SR" value="597">Suriname (+597)</option>
                <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                <option data-countryCode="SE" value="46">Sweden (+46)</option>
                <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                <option data-countryCode="SI" value="963">Syria (+963)</option>
                <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                <option data-countryCode="TH" value="Thailand">Thailand (+66)</option>
                <option data-countryCode="TG" value="228">Togo (+228)</option>
                <option data-countryCode="TO" value="676">Tonga (+676)</option>
                <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                <option data-countryCode="TR" value="Turkey">Turkey (+90)</option>
                <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                <option data-countryCode="UG" value="256">Uganda (+256)</option>
                <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                <option data-countryCode="VN" value="Vietnam">Vietnam (+84)</option>
                <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                <option data-countryCode="YE" value="Yemen">Yemen (South)(+967)</option>
                <option data-countryCode="ZM" value="Zambia">Zambia (+260)</option>
                <option data-countryCode="ZW" value="Zimbabwe">Zimbabwe (+263)</option>
            </select>
                @error('country')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
          </div>
          <div class="form-group">
            <label for="mobile">Mobile</label>
            <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus placeholder="Ex. 01750657483">
                
            @error('mobile')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

        <?php
         $ran2 = mt_rand(10000, 99999);
        $usercode = 'REF' . $ran2; 
        ?>
          <div class="form-group">
            <label for="usercode">Ref. Code</label>
            <input id="usercode" type="hidden" readonly="" class="form-control @error('usercode') is-invalid @enderror" name="usercode" value="{{ $usercode }}" autocomplete="usercode" autofocus placeholder="Enter your ref: code">

            <input id="refcode" type="text"  class="form-control @error('refcode') is-invalid @enderror" name="refcode" readonly value="{{$ref}}"  autocomplete="refcode" autofocus placeholder="Enter your ref: code">
                
            @error('usercode')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            @error('refcode')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                      </div>
             @endif
          </div>
         

          <div class="form-group">
            <label for="password">Password</label>
            
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror<i  class="fa fa-eye" onclick="myFunction()"></i>
            
          </div>

          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            
             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"><i  class="fa fa-eye" onclick="myFunction()"></i>
            
          </div><br>

          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
            <label class="custom-control-label" for="defaultRegisterFormNewsletter"> <span>By continuing, I certify that I am 18 years of age, and I agree to the<a href="" target="_blank" rel="noopener noreferrer"><span> User Agreement</span></a> and <a href="" target="_blank" rel="noopener noreferrer"><span>Privacy Policy.</span></a>.</span></label>
          </div>
          <button  class="btn btn-info my-4 btn-block " type="submit">Create account</button>
          
        </form>
      </div>
      <div class="col-md-3">

      </div>
    </div><br>
    <p >Already have a 5XBetclub account? <a href="{{ route('login') }}" >Log in</a> </p>
  </div>
@endsection
@section('style')
<link href="{{ asset('coinbase/css/signup.css') }}" rel="stylesheet">
@endsection