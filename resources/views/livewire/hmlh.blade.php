<div class="container mt-4">
    <div class="tab-content">
        <!-- تبويب إدارة الحملات -->
        <div class="tab-pane fade show active animate__animated animate__fadeIn" id="campains">
            <!-- بطاقة إضافة وتعديل الحملات -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    إدارة الحملات
                </div>
                <div class="card-body">
                    <p>يمكنك هنا إضافة حملة جديدة أو تعديل الحملات الحالية.</p>
                    @if (!$isEditMode)
                        <form wire:submit.prevent="storehmlh">
                        @else
                            <form wire:submit.prevent="update">
                    @endif
                    <!-- عرض رسالة النجاح -->
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div  class="mb-3" x-data="{ uploading: false, progress: 0 }"
                    x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false"
                    x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <label for="campaignName" class="form-label">اسم الحملة</label>
                        <input wire:model="name" type="text" class="form-control" id="campaignName"
                            placeholder="أدخل اسم الحملة">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="campaignName" class="form-label">صورة الحملة</label>
                        <input wire:model.live="image" type="file" class="form-control" id="campaignName"
                            placeholder="أدخل صورة الحملة">
                            <div x-show="uploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="campaignDesc" class="form-label">وصف الحملة</label>
                        <textarea wire:model="note" class="form-control" id="campaignDesc" rows="3" placeholder="أدخل وصف الحملة"></textarea>
                        @error('note')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @if (!$isEditMode)
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    @else
                        <button type="submit" class="btn btn-primary">تحديث</button>
                        <button type="button" class="btn btn-secondary" wire:click="resetInput">إلغاء</button>
                        </form>
                    @endif
                    </form>
                </div>
            </div>
            <!-- بطاقة جدول عرض البيانات -->
            <div class="card">
                <div class="card-header">جدول البيانات</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>الملاحظات</th>
                                <th>الرابط</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->note }}</td>
                                    <td><a href="https://www.tweetsbank.online/campaign/{{$item->uid}}">فتح</a></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning"
                                            wire:click="edit({{ $item->id }})">تعديل</button>
                                        <button class="btn btn-sm btn-danger"
                                            wire:click="delete({{ $item->id }})">حذف</button>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($data->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">لا توجد بيانات</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- تبويب إدارة التغريدات (محتوى احتياطي) -->
        <div class="tab-pane fade animate__animated animate__fadeIn" id="tweets">
            <div class="card">
                <div class="card-header bg-success text-white">
                    إدارة التغريدات
                </div>
                <div class="card-body">
                    <p>سيتم إضافة محتوى إدارة التغريدات لاحقاً.</p>
                </div>
            </div>
        </div>

        <!-- تبويب عرض الزوار (محتوى احتياطي) -->
        <div class="tab-pane fade animate__animated animate__fadeIn" id="visitors">
            <div class="card">
                <div class="card-header bg-info text-white">
                    عرض الزوار
                </div>
                <div class="card-body">
                    <p>سيتم إضافة محتوى عرض الزوار لاحقاً.</p>
                </div>
            </div>
        </div>
    </div>
</div>