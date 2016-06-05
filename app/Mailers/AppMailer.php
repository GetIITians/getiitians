<?php
namespace App\Mailers;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Contracts\Mail\Mailer;
class AppMailer
{
	/**
	 * The Laravel Mailer instance.
	 *
	 * @var Mailer
	 */
	protected $mailer;
	/**
	 * The sender of the email.
	 *
	 * @var string
	 */
	protected $from = 'getiitians@gmail.com';
	/**
	 * The recipient of the email.
	 *
	 * @var string
	 */
	protected $to = 'getiitians@gmail.com';
	/**
	 * The subject of the email.
	 *
	 * @var string
	 */
	protected $subject = 'Student Enquiry';
	/**
	 * The view for the email.
	 *
	 * @var string
	 */
	protected $view;
	/**
	 * The data associated with the view for the email.
	 *
	 * @var array
	 */
	protected $data = [];
	/**
	 * Create a new app mailer instance.
	 *
	 * @param Mailer $mailer
	 */
	public function __construct(Mailer $mailer)
	{
		$this->mailer = $mailer;
	}
	/**
	 * Deliver the email confirmation.
	 *
	 * @param  User $user
	 * @return void
	 */
	public function sendEmailConfirmationTo(User $user)
	{
		$this->to = $user->email;
		$this->view = 'emails.confirm';
		$this->data = compact('user');
		$this->subject = 'getIITians email confirmation';
		$this->deliver();
	}
	/**
	 * Deliver the email to admin [for a student trying to message a teacher].
	 *
	 * @param  Request $request
	 * @return void
	 */
	public function sendMessageToTeacher(Request $request)
	{
		$this->view = 'emails.enquiry.message';
		$this->data = ['teacher' => $request->input('recipient'), 'content' => $request->input('message')];
		$this->subject = 'Student Enquiry for a Teacher';
		$this->deliver();
	}
	/**
	 * Deliver the email to admin [for a student enquiry].
	 *
	 * @param  Request $request
	 * @return void
	 */
	public function sendEnquiryToAdmin(Request $request)
	{
		$this->view = 'emails.enquiry.enquiry';
		$this->data = [ 'class' => $request->input('class'), 'subject' => $request->input('subject'), 'topic' => $request->input('topic'), 'enquiry' => $request->input('enquiry'), 'email' => $request->input('email'), 'phone' => $request->input('phone') ];
		$this->deliver();
	}
	/**
	 * Deliver the email to admin [for a student enquiry].
	 *
	 * @param  Request $request
	 * @return void
	 */
	public function sendContactToAdmin(Request $request)
	{
		$this->view = 'emails.contact';
		$this->data = [ 'name' => $request->input('name'), 'email' => $request->input('email'), 'phone' => $request->input('phone'), 'messageBody' => $request->input('message') ];
		$this->deliver();
	}
	/**
	 * Deliver the email to admin [for a student trying to call a teacher].
	 *
	 * @param  Request $request
	 * @return void
	 */
	public function sendCallToTeacher(Request $request)
	{
		$this->view = 'emails.enquiry.call';
		$this->data = [ 'email' => $request->input('email'), 'phone' => $request->input('phone')];
		$this->deliver();
	}
	/**
	 * Deliver the email.
	 *
	 * @return void
	 */
	public function deliver()
	{
		$this->mailer->send($this->view, $this->data, function ($message) {
			$message->from($this->from, 'getIITians')
				->to($this->to)->subject($this->subject);
		});
	}
}