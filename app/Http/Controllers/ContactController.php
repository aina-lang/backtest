
<?php
// use app/Http/Controllers/Controller.php;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendContactForm(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Envoyez l'e-mail à votre adresse e-mail
        Mail::to('merciaaina@gmail.com')->send(new ContactFormMail($data));
echo"yes";
        // Réponse à l'utilisateur (vous pouvez personnaliser le message de succès)
        return response()->json(['message' => 'Message sent successfully!'], 200);
    }

}
