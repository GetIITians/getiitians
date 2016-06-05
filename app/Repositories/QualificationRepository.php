<?php

namespace App\Repositories;

use App\User;
use App\Qualification;
use App\Teacher;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;

class QualificationRepository
{
	/**
	 * Update the Teacher qualifications.
	 *
	 * @param  Illuminate\Http\Request $request
	 * @return void
	 */
	public function updateQualification(Request $request)
	{
		foreach ($request->input('qualification') as $key => $qualification)
		{
			$qualification['verification'] = $request->files->all()['qualification'][$key]['verification'];
			$qualification['passout'] = Carbon::createFromFormat('d/m/Y', $qualification['passout'])->toDateTimeString();
			if(array_key_exists('verification',$qualification) && $qualification['verification'] !== NULL){
				$file = $qualification['verification'];
				$destinationPath = 'img/uploads';
				$filename = str_random(12);
				$extension = $file->getClientOriginalExtension();
				$upload_status = $file->move($destinationPath, $filename.".".$extension);

				if( $upload_status ) {
					$qualification['verification'] = $destinationPath."/".$filename.".".$extension;
				}
			}
			if(array_key_exists('id',$qualification))
			{
				$id = $qualification['id'];
				unset($qualification['id']);
				Qualification::where('id',$id)->update($qualification);
			}
			else
			{
				$qual = new Qualification;
				$qual->teacher_id = $request->user()->id;
				$qual->college = $qualification['college'];
				$qual->degree = $qualification['degree'];
				$qual->branch = $qualification['branch'];
				$qual->passout = $qualification['passout'];
				$qual->verification = $qualification['verification'];
				$qual->save();
			}
		}
	}
}