<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hmlh as Hmlht ; 
use Auth;
use Str;
use Livewire\WithFileUploads;

class Hmlh extends Component
{
    use WithFileUploads;

    public function render()
    {
        $data = Hmlht::all();
        return view('livewire.hmlh', ['data' => $data]);
    }
    public $name;
    public $note;
    public $image;
    public $selectedId;
    public $isEditMode = false;

    public function storehmlh()
    {
        // dd($this->image);
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'note' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ], [
            'name.required' => 'اسم الحقل مطلوب.',
            'name.string'   => 'يجب أن يكون الاسم نصًا.',
            'name.max'      => 'يجب ألا يتجاوز الاسم 255 حرفًا.',
            'note.string'   => 'يجب أن يكون الحقل ملاحظات نصًا.',
            'image.image' => 'يجب أن يكون الملف صورة.',
            'image.mimes' => 'يجب أن تكون الصورة بصيغة: jpeg, png, jpg, gif.',
        ]);
        $uniqueName = Str::uuid() . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs(path: 'TF', name: $uniqueName);
        $h=new Hmlht();
        $h->name=$this->name;
        $h->image=$uniqueName;
        $h->uid=Str::uuid();
        $h->note=$this->note;
        $h->createed_by=Auth::id();
        $h->save();
        $this->resetInput();
        session()->flash('message', 'تم حفظ البيانات بنجاح!');

    }
    public function edit($id)
    {
        $record = Hmlht::findOrFail($id);
        $this->selectedId = $record->id;
        $this->name = $record->name;
        $this->note = $record->note;
        $this->isEditMode = true;
    }
    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'note' => 'nullable|string',
        ], [
            'name.required' => 'اسم الحقل مطلوب.',
            'name.string'   => 'يجب أن يكون الاسم نصًا.',
            'name.max'      => 'يجب ألا يتجاوز الاسم 255 حرفًا.',
            'note.string'   => 'يجب أن يكون الحقل ملاحظات نصًا.',
        ]);

        $r = Hmlht::findOrFail($this->selectedId);
        $r->name=$this->name;
        $r->note=$this->note;
        $r->save();

        session()->flash('message', 'تم تعديل البيانات بنجاح!');
        $this->resetInput();
    }

    public function delete($id)
    {
        $record = Hmlht::findOrFail($id);
        $record->delete();
        session()->flash('message', 'تم حذف البيانات بنجاح!');
    }

    // إعادة تعيين المتغيرات المستخدمة في نموذج التعديل
    public function resetInput()
    {
        $this->name = '';
        $this->note = '';
        $this->selectedId = null;
        $this->isEditMode = false;
    }
}
