<div>
    <div class="row">
        <div class="col-12 animate__animated animate__flipInY">
            <form wire:submit.prevent="saveTweet" method="post">
                <div class="card row m-2 p-4">
                    <div class="col-12">
                        <h3 class="text-center">إضافة تغريدة جديدة</h3>
                    </div>

                    {{-- اختيار نوع المنشور --}}
                    <div class="col-12 mt-3">
                        <label for="tweetType">نوع التغريدة</label>
                        <select wire:model.live="t" id="tweetType" class="form-control">
                            <option value="">اختر نوع التغريدة</option>
                            <option value="text">نص</option>
                            <option value="image">صورة</option>
                            <option value="video">فيديو</option>
                        </select>
                        @error('t')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 mt-3">
                        <label for="tweetType">الحملة</label>
                        <select wire:model.live="campaign_id" id="tweetType" class="form-control">
                            <option value="0">اختر الحملة</option>
                            @foreach ($hm as $item)
                                <option value="{{ $item->uid }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('campaign_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- حقل نص التغريدة (إجباري دائماً) --}}
                    <div class="col-12 mt-3">
                        <label for="tweetText">نص التغريدة</label>
                        <textarea wire:model="texts" name="texts" class="form-control" id="tweetText" cols="30" rows="3"></textarea>
                        @error('texts')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- حقل رابط الصورة أو الفيديو (يظهر فقط عند اختيار صورة أو فيديو) --}}
                    @if ($t == 'image' || $t == 'video')
                        <div class="col-12 mt-3">
                            <label for="tweetUrl">رابط الصورة أو الفيديو</label>
                            <input type="url" wire:model="urls" name="urls" class="form-control" id="tweetUrl">
                            @error('urls')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif

                    {{-- زر الحفظ --}}
                    <div class="col-12 mt-4 text-center">
                        <button type="submit" class="btn btn-primary">حفظ التغريدة</button>
                    </div>

                    {{-- عرض رسالة النجاح عند الحفظ --}}
                    @if (session()->has('message'))
                        <div class="col-12 mt-3">
                            <div class="alert alert-success text-center">
                                {{ session('message') }}
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="card m-2 p-2">
        <form wire:submit="readcsv" method="post" enctype="multipart/form-data">
            <div class="row">
                @if (session()->has('message'))
                    <div style="color: green;">{{ session('message') }}</div>
                @endif

                <div class="col-md-6 col-6">
                    <label class="lable-control" for="file">اختر ملف Csv:</label>
                    <input class="form-control" type="file" id="file" wire:model="fileNamecsv">
                    @error('fileNamecsv')
                        <span style="color: red;">{{ $message }}</span>
                        
                    @enderror
                    @error('file')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 col-12 mt-3">
                    <label for="tweetType">الحملة</label>
                    <select wire:model.live="hamlh_idcsv" id="tweetType" class="form-control">
                        <option value="0">اختر الحملة</option>
                        @foreach ($hm as $item)
                            <option value="{{$item->uid}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('campaign_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <br><br>
                <button type="submit">استيراد التغريدات</button>
            </div>
        </form>
    </div>

    <div class="row justify-content-center align-items-center g-2">

        @foreach ($tw as $key => $item)
            <div class="col-md-4 col-12">
                <div class="card p-2">
                    <center>{{ $key + 1 }}</center>
                    <h2> {{ $item->texts }}</h2>
                    <button class="btn btn-danger" wire:click='delete({{ $item->id }})'>حذف</button>

                </div>
            </div>
        @endforeach
    </div>

</div>
