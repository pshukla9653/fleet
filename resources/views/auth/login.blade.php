@extends('layouts.app')

@section('content')
<div class="container-fluid forbg">
    <div class="row" style="padding: 10px;">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 forcolumn">
        <div class="row forrow" style="margin:15px !important;">
         
          <svg class="traffic-jam" viewBox="0 0.332 77.063 77.062">
                <path id="traffic-jam" d="M 47.34382629394531 47.05122756958008 L 44.25077056884766 37.48420333862305 L 44.22866439819336 37.41835784912109 C 43.24233245849609 34.59010314941406 40.58998870849609 32.69081878662109 37.62863922119141 32.69081878662109 L 15.32672882080078 32.69222640991211 C 12.3653678894043 32.69222640991211 9.713037490844727 34.59152221679688 8.727173805236816 37.41835784912109 L 5.604953765869141 47.07945251464844 C 4.498677730560303 47.54699325561523 3.481301546096802 48.24170684814453 2.60973072052002 49.14431762695312 C 0.9267948269844055 50.88462448120117 0.0001964569091796875 53.16632461547852 0.0001964569091796875 55.56890106201172 L 0.0001964569091796875 71.37284851074219 C 0.0001964569091796875 74.69213104248047 2.700978517532349 77.39339447021484 6.020745277404785 77.39339447021484 C 9.085576057434082 77.39339447021484 11.62079238891602 75.09098815917969 11.99238109588623 72.12541198730469 L 40.98889541625977 72.12541198730469 C 41.36047744750977 75.09098815917969 43.89568710327148 77.39339447021484 46.96053314208984 77.39339447021484 C 50.1114501953125 77.39339447021484 52.98108291625977 74.88214874267578 52.98108291625977 72.12541198730469 L 52.98108291625977 55.41838836669922 C 52.98108291625977 51.63814926147461 50.64577484130859 48.39505004882812 47.3438720703125 47.05123519897461 Z M 15.32716464996338 38.7127685546875 L 37.62858581542969 38.71135711669922 C 38.01851654052734 38.71135711669922 38.38821411132812 38.98463439941406 38.53590774536133 39.37973785400391 L 40.80113220214844 46.38755416870117 L 12.15513610839844 46.38755416870117 L 14.41942882537842 39.37973785400391 C 14.56664943695068 38.98557662963867 14.9363489151001 38.7127685546875 15.32721328735352 38.7127685546875 Z M 46.96043395996094 63.09454345703125 C 46.96043395996094 64.75397491455078 45.61005020141602 66.10482025146484 43.95015716552734 66.10482025146484 L 9.030993461608887 66.10482025146484 C 7.371106624603271 66.10482025146484 6.020721435546875 64.75395965576172 6.020721435546875 63.09454345703125 L 6.020721435546875 55.5688591003418 C 6.020721435546875 53.85535049438477 7.399330615997314 52.4080696105957 9.030993461608887 52.4080696105957 L 43.95015716552734 52.4080696105957 C 45.61005020141602 52.4080696105957 46.96043395996094 53.75845718383789 46.96043395996094 55.41834259033203 L 46.96043395996094 63.09454345703125 Z M 19.71746635437012 56.17091751098633 L 33.41421127319336 56.17091751098633 L 33.41421127319336 62.19145584106445 L 19.71746635437012 62.19145584106445 L 19.71746635437012 56.17091751098633 Z M 43.19759750366211 59.18118667602539 C 43.19759750366211 60.84296035766602 41.85002899169922 62.19145584106445 40.18732452392578 62.19145584106445 C 38.52462005615234 62.19145584106445 37.17704391479492 60.84296035766602 37.17704391479492 59.18118667602539 C 37.17704391479492 57.51848220825195 38.52462005615234 56.17091751098633 40.18732452392578 56.17091751098633 C 41.85002899169922 56.17091751098633 43.19759750366211 57.51848220825195 43.19759750366211 59.18118667602539 Z M 15.95462322235107 59.18118667602539 C 15.95462322235107 60.84296035766602 14.60705757141113 62.19145584106445 12.94434928894043 62.19145584106445 C 11.28164291381836 62.19145584106445 9.934076309204102 60.84296035766602 9.934076309204102 59.18118667602539 C 9.934076309204102 57.51848220825195 11.28164291381836 56.17091751098633 12.94434928894043 56.17091751098633 C 14.60705757141113 56.17091751098633 15.95462322235107 57.51848220825195 15.95462322235107 59.18118667602539 Z M 64.26952362060547 42.47416305541992 C 62.6068115234375 42.47416305541992 61.25923919677734 41.12566375732422 61.25923919677734 39.46389007568359 C 61.25923919677734 37.80118179321289 62.6068115234375 36.45362091064453 64.26952362060547 36.45362091064453 C 65.93222808837891 36.45362091064453 67.27979278564453 37.80118179321289 67.27979278564453 39.46389007568359 C 67.27979278564453 41.12566375732422 65.93222808837891 42.47416305541992 64.26952362060547 42.47416305541992 Z M 18.96489715576172 22.75686836242676 C 20.62760353088379 22.75686836242676 21.97517013549805 24.10443496704102 21.97517013549805 25.76714324951172 C 21.97517013549805 27.42890930175781 20.62760353088379 28.77741432189941 18.96489715576172 28.77741432189941 C 17.30219268798828 28.77741432189941 15.95462322235107 27.42890930175781 15.95462322235107 25.76714324951172 C 15.95462322235107 24.10443496704102 17.30219268798828 22.75686836242676 18.96489715576172 22.75686836242676 Z M 6.065394401550293 30.57417869567871 C 6.03576135635376 30.28067207336426 6.020710468292236 29.98293876647949 6.020710468292236 29.68191337585449 L 6.020710468292236 22.75687599182129 C 6.020710468292236 20.35430145263672 6.947309970855713 18.07261085510254 8.630243301391602 16.33181953430176 C 9.51121997833252 15.4197998046875 10.54176616668701 14.71944332122803 11.66262340545654 14.25285053253174 L 14.75286388397217 5.042350292205811 C 15.74296283721924 2.223975658416748 18.39105987548828 0.3317413330078125 21.34724235534668 0.3317413330078125 L 43.64914703369141 0.3317413330078125 C 46.60534286499023 0.3317413330078125 49.25344085693359 2.22397518157959 50.2435302734375 5.042350292205811 L 50.93213272094727 7.554050922393799 L 44.52590179443359 7.554050922393799 C 44.36362075805664 7.197991371154785 44.01649475097656 6.349940776824951 43.64914703369141 6.349940776824951 L 21.34724426269531 6.349940776824951 C 20.94979476928711 6.349940776824951 20.57350921630859 6.635917663574219 20.43193244934082 7.040892601013184 L 20.42299842834473 7.066291809082031 L 18.30263137817383 13.57554054260254 L 28.45665740966797 13.57554054260254 C 27.91574859619141 14.42218112945557 27.46609115600586 15.3398380279541 27.12461280822754 16.31818008422852 L 27.09027862548828 16.41695404052734 L 26.06302070617676 19.5960750579834 L 15.05153274536133 19.5960750579834 C 13.41986751556396 19.5960750579834 12.04125881195068 21.04335784912109 12.04125881195068 22.75686264038086 L 12.04125881195068 27.09918212890625 C 9.764732360839844 27.69888877868652 7.701757431030273 28.9076976776123 6.065396785736084 30.57417488098145 Z M 77.06318664550781 35.7010498046875 L 77.06318664550781 52.4080696105957 C 77.06318664550781 55.16481781005859 74.19355773925781 57.67605209350586 71.04264068603516 57.67605209350586 C 67.97779846191406 57.67605209350586 65.44258880615234 55.3736572265625 65.07099914550781 52.4080696105957 L 58.6986198425293 52.4080696105957 C 58.24613571166992 50.18422317504883 57.30119323730469 48.1381950378418 55.98372650146484 46.38751983642578 L 68.03240203857422 46.38751983642578 C 69.69229888916016 46.38751983642578 71.04270172119141 45.03665542602539 71.04270172119141 43.37725067138672 L 71.04270172119141 35.7010498046875 C 71.04270172119141 34.04116058349609 69.69229888916016 32.69077301025391 68.03240203857422 32.69077301025391 L 48.57941436767578 32.69077301025391 C 46.22010040283203 28.99989891052246 42.11672210693359 26.67022514343262 37.62765884399414 26.67022514343262 L 64.81935119628906 26.67022514343262 L 62.62137603759766 20.27010154724121 C 62.48450088500977 19.87876892089844 62.10821914672852 19.5960865020752 61.71076583862305 19.5960865020752 L 39.40884780883789 19.5960865020752 C 39.01328659057617 19.5960865020752 38.63887786865234 19.87641716003418 38.49589538574219 20.2790412902832 L 36.30638885498047 26.8193302154541 L 29.9420166015625 26.82074165344238 L 32.80929946899414 18.30119514465332 C 33.79516220092773 15.47435855865479 36.44749069213867 13.57553672790527 39.40884780883789 13.57553672790527 L 61.71076583862305 13.57553672790527 C 64.67214202880859 13.57553672790527 67.32447052001953 15.47435855865479 68.31032562255859 18.30119514465332 L 71.41043090820312 27.32777786254883 C 74.72080230712891 28.66828727722168 77.06317901611328 31.9156322479248 77.06317901611328 35.70105361938477 Z M 52.19120407104492 42.47416305541992 L 50.24440383911133 36.45362091064453 L 57.4963493347168 36.45362091064453 L 57.4963493347168 42.47416305541992 L 52.19120407104492 42.47416305541992 Z M 52.19120407104492 42.47416305541992">
                </path>
            </svg>
        </div>
        <div class="row forrow">
          <h2 style="color: #fff; margin-top: 10px;">PRESS FLEET TOOL</h2>
        </div>
        <div class="row forrow">
          <form method="POST" action="{{ route('login') }}">
              @csrf
            <div class="container">
              <input id="email" type="email"  placeholder="Username" class="username @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" required autocomplete="email" autofocus/><br>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  <br>
              @enderror
             
              <input id="password" type="password" placeholder="Password" class="password @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br>
              @error('password')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
  
              @enderror
              <label style="color: #fff;">
               
                <input class="rememberme" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/> {{ __('Remember Me') }}
              </label><br>
              <button class="button button2"><p class="login">{{ __('Login') }}</p></button>
            </div>
            <div class="container" style="margin-top: 30px;">
              
              @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
          @endif
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
    </div>
  </div>
@endsection
