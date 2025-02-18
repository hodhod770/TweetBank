<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hmlh as Hmlht ; 
use Auth;
use Str;
class Hmlh extends Component
{
    public function render()
    {
        $data = Hmlht::all();
        return view('livewire.hmlh', ['data' => $data]);
    }
    public $name;
    public $note;
    public $selectedId;
    public $isEditMode = false;

    public function storehmlh()
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
        $h=new Hmlht();
        $h->name=$this->name;
        $h->uid=Str::uuid();
        $h->note=$this->note;
        $h->createed_by=Auth::id();;
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
