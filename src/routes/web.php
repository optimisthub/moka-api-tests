<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () {
    return view('home');
});

$router->post('/api-tests', function (Request $request) {
    $this->validate($request, [
        'dealer_code' => 'required',
        'username' => 'required',
        'password' => 'required',
        'service' => 'required|in:payment,bin-number,installment-info',
    ], [
        'dealer_code.required' => 'Bayi Kodu zorunlu bir alandır.',
        'username.required' => 'Kullanıcı Adı zorunlu bir alandır.',
        'password.required' => 'Şifre zorunlu bir alandır.',
        'service.required' => 'Hizmet zorunlu bir alandır.',
    ]);

    $dealerCode = $request->input('dealer_code');
    $username = $request->input('username');
    $password = $request->input('password');
    $service = $request->input('service');

    $moka = new \Moka\MokaClient([
        'dealerCode' => $dealerCode,
        'username' => $username,
        'password' => $password,
        'baseUrl' => 'https://service.refmoka.com'
    ]);

    switch ($service) {
        case 'payment':
            $createPaymentRequest = new Moka\Model\CreatePaymentRequest;

            $createPaymentRequest->setCardHolderFullName('John Doe');
            $createPaymentRequest->setCardNumber('5127541122223332');
            $createPaymentRequest->setExpMonth('12');
            $createPaymentRequest->setExpYear('2025');
            $createPaymentRequest->setCvcNumber('123');
            $createPaymentRequest->setAmount(100.00);
            $createPaymentRequest->setCurrency('TL');
            $createPaymentRequest->setInstallmentNumber(1);
            $createPaymentRequest->setClientIp('192.168.1.116');
            $createPaymentRequest->setOtherTrxCode('3D5ABC24-456');
            $createPaymentRequest->setIsPoolPayment(0);
            $createPaymentRequest->setIsTokenized(0);
            $createPaymentRequest->setIntegratorId(0);
            $createPaymentRequest->setSoftware('Moka API Tests');
            $createPaymentRequest->setDescription('');
            $createPaymentRequest->setIsPreAuth(0);

            $buyer = new Moka\Model\Buyer;
            $buyer->setBuyerFullName('John Doe');
            $buyer->setBuyerGsmNumber('5551110022');
            $buyer->setBuyerEmail('email@email.com');
            $buyer->setBuyerAddress('Levent Mah. Meltem Sok. İş Kuleleri Kule 2 No: 10 / 4 Beşiktaş / İstanbul');

            $createPaymentRequest->setBuyerInformation($buyer);

            $response = $moka->payments()->create($createPaymentRequest);

            return response()->json([
                'request' => $createPaymentRequest,
                'response' => json_decode($response->getContent()),
                'result_message' => $response->getResultMessage(),
                'result_code' => $response->getResultCode(),
                'documentation_link' => 'https://developer.moka.com/home.php?page=3dsiz-odeme'
            ]);
            break;
        case 'bin-number':
            $retrieveBinNumberRequest = new Moka\Model\RetrieveBinNumberRequest();
            $retrieveBinNumberRequest->setBinNumber('512754');

            $response = $moka->binNumber()->retrieve($retrieveBinNumberRequest);

            return response()->json([
                'request' => $retrieveBinNumberRequest,
                'response' => json_decode($response->getContent()),
                'result_message' => $response->getResultMessage(),
                'result_code' => $response->getResultCode(),
                'documentation_link' => 'https://developer.moka.com/home.php?page=bin-sorgu'
            ]);
            break;
        case 'installment-info':
            $retrieveInstallmentInfoRequest = new Moka\Model\RetrieveInstallmentInfoRequest();
            $retrieveInstallmentInfoRequest->setBinNumber('512754');
            $retrieveInstallmentInfoRequest->setCurrency('TL');
            $retrieveInstallmentInfoRequest->setOrderAmount(100);
            $retrieveInstallmentInfoRequest->setIsThreeD(1);
            $retrieveInstallmentInfoRequest->setIsIncludedCommissionAmount(1);

            $response = $moka->payments()->retrieveInstallmentInfo($retrieveInstallmentInfoRequest);

            return response()->json([
                'request' => $retrieveInstallmentInfoRequest,
                'response' => json_decode($response->getContent()),
                'result_message' => $response->getResultMessage(),
                'result_code' => $response->getResultCode(),
            ]);
            break;
    }
});
