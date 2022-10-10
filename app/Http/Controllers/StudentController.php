<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\student;
use Illuminate\Http\Request;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter');
        $data = student::with(['major']);
        $major = Major::get();


        // select * from students where name like '%$search%'
        //untuk mengecek inputan search
        // if ($search) {
        //     $data->where('name', 'like', "%$search%")
        //          ->orWhere('address','like', "%$search%");
        // }
        if ($search) {
            $data->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('address','like', "%$search%");
            });
        }

        if($filter) {
            $data->where(function ($query) use ($filter){
                $query->where('major_id','=',$filter);
            });
        }

        $data = $data->paginate(15);
        //ditambahkan with sebelum get untuk memanggil public function major di anggota.php
        // $data = student::with(['major'])->get();
        return view('pages.student.list', [
            'data' => $data,
            'majors' => Major::get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ditambahkan major untuk memanggil relasi major
        $student = new Student();
        $majors = Major::get();
        return view('pages.student.form',['student' => $student,'majors' => $majors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorestudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorestudentRequest $request)
    {
        //
        $data = $request->all();
        student::create($data);
        return redirect('student')->with('notif','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        //
        $majors = Major::get();
        return view('pages.student.form',
        ['student'=>$student,'majors'=>$majors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatestudentRequest  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatestudentRequest $request, student $student)
    {
        //
        $data = $request->all();
        $student -> update($data);
        //untuk memanggil fungsi notif session tambahkan panah setelah kurung,lalu ketikan with
        //untuk parameter pertama berdasarkan nama dari variabel session dan parameter kedua berisikan pesan yang akan di tampilkan
        return redirect('student')->with('notif','berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        //
        $student->delete();
        return redirect('student')->with('notif','berhasil hapus data');
    }
}
