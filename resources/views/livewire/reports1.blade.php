  <div class="card" dir="rtl">

      <div class="row">
          <div class="col-4">
              <h4>

              </h4>
          </div>

          <div class="col-4" style="text-align: center;">
              <h4>
                  بسم الله الرحمن الرحيم
              </h4>
              <h4>
                  تقرير عن الحملة {{ $hm->name ?? 'كل الحملات' }}
              </h4>
          </div>

          <div class="col-4">
              <h4>

              </h4>
          </div>

      </div>
      <div class="table-responsive">
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>عدد التغريدات</th>
                      <th>عدد الزوار</th>
                      <th>عدد الايبيهات الفريدة</th>
                      <th>عدد اليمنيين</th>
                      <th>عدد الاجانب</th>
                      <th>عدد الدول</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>{{ count($tweets) }}</td>
                      <td>{{ count($ips) }}</td>
                      <td>{{ count($uniqueIps) }}</td>
                      <td>{{ count($ips->where('country', 'Yemen')) }}</td>
                      <td>{{ count($ips->where('country', '!=', 'Yemen')) }}</td>
                      <td>{{ count($ips->groupBy('country')) }}</td>
                  </tr>

              </tbody>
          </table>
      </div>
      <center>
        <h4>احصائيات الدول</h4>
      </center>
      <div class="row">
          @foreach ($ips->groupBy('country') as $item)
              <div class="col-md-3 col-12">
                  <div class="card p-2 m-2" style="text-align: center">
                      <center>
                          <div class="p-4"
                              style="background-color: beige; width: max-content;  text-align: center; border-radius: 50%;">
                              <h4>
                                  {{ count($item) }}
                              </h4>

                          </div>
                      </center>
                      <h4>
                          {{ $item->first()->country }}
                      </h4>
                  </div>
              </div>
          @endforeach
      </div>
      <h4>احصائيات المدينة</h4>
        <div class="row">
            @foreach ($ips->groupBy('city') as $item)
                <div class="col-md-3 col-12">
                    <div class="card p-2 m-2" style="text-align: center">
                        <center>
                            <div class="p-4"
                                style="background-color: beige; width: max-content;  text-align: center; border-radius: 50%;">
                                <h4>
                                    {{ count($item) }}
                                </h4>
    
                            </div>
                        </center>
                        <h4>
                            {{ $item->first()->city }}
                        </h4>
                        <small>{{$item->first()->country}}</small>
                    </div>
                </div>
            @endforeach
        </div>

        {{--     <div class="row">
            @foreach ($ips->groupBy('country') as $item)
            <div class="col-12">
                <h4>
                    {{ $item->first()->country }}
                </h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>المدينة</th>
                                <th>عدد الايبيهات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->groupBy('city') as $city => $ips)
                                <tr>
                                    <td style="text-align:cenger">{{ $city }}</td>
                                    <td style="text-align:cenger">{{ count($ips) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            @endforeach
        </div> --}}
      <div class="table-responsive">
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>IP</th>
                      <th>البلد</th>
                      <th>المدينة</th>
                      <th>مزود الخدمة</th>
                      <th>جوال</th>
                      <th>بروكسي</th>
                      <th>تاريخ الإضافة</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($ips as $ip)
                      <tr>
                          <td>{{ $ip->ip }}</td>
                          <td>{{ $ip->country }}</td>
                          <td>{{ $ip->city }}</td>
                          <td>{{ $ip->isp }}</td>
                          <td>{{ $ip->mobile ? 'نعم' : 'لا' }}</td>
                          <td>{{ $ip->proxy ? 'نعم' : 'لا' }}</td>
                          <td>{{ $ip->created_at->format('Y-m-d') }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
