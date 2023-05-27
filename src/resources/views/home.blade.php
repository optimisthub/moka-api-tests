<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moka API Tests</title>

    <link rel="stylesheet" href="/assets/css/highlight.min.css">
    <link rel="stylesheet" href="/assets/css/moka-tests.css">
</head>
<body>
    <div class="moka-tests">
        <div class="moka-tests-header">
            <img src="/assets/images/moka-logo.png" class="moka-tests-header-logo">
        </div>
        <div class="moka-tests-header-alert">API Tests - Test Mode</div>
        <div class="moka-tests-form">
            <div class="moka-tests-input-container">
                <div class="moka-tests-input-icon">
                    <svg width="16" height="16" viewBox="0 0 16 16">
                        <g fill="#AFAFAF" transform="translate(2.071 .25)">
                            <circle cx="6.415" cy="3.913" r="3.67"></circle>
                            <path d="M6.415 8.584a6.347 6.347 0 00-6.34 6.34c0 .184.15.334.334.334h12.013c.184 0 .333-.15.333-.334a6.347 6.347 0 00-6.34-6.34z"></path>
                        </g>
                    </svg>
                </div>
                <input type="text" class="moka-tests-input" id="dealer-code" value="{{ request()->input('dealer_code') }}" placeholder="Bayi Kodu">
            </div>
            <div class="moka-tests-input-container">
                <div class="moka-tests-input-icon">
                    <svg width="16" height="16" viewBox="0 0 16 16">
                        <g fill="#AFAFAF" transform="translate(2.071 .25)">
                            <circle cx="6.415" cy="3.913" r="3.67"></circle>
                            <path d="M6.415 8.584a6.347 6.347 0 00-6.34 6.34c0 .184.15.334.334.334h12.013c.184 0 .333-.15.333-.334a6.347 6.347 0 00-6.34-6.34z"></path>
                        </g>
                    </svg>
                </div>
                <input type="text" class="moka-tests-input" id="username" value="{{ request()->input('username') }}" placeholder="Kullanıcı Adı">
            </div>
            <div class="moka-tests-input-container">
                <div class="moka-tests-input-icon">
                    <svg width="16" height="16" viewBox="0 0 16 16">
                        <path fill="#AFAFAF" d="M12.934 6.333h-.493V4.5C12.44 2.015 10.453 0 8 0S3.56 2.015 3.56 4.5v1.833h-.494c-.727 0-1.316.597-1.316 1.334v7c0 .736.59 1.333 1.316 1.333h9.868c.727 0 1.316-.597 1.316-1.333v-7c0-.737-.59-1.334-1.316-1.334zm-6.25 4a1.329 1.329 0 0 1 1.084-1.318 1.313 1.313 0 0 1 1.468.854 1.342 1.342 0 0 1-.578 1.613V13a.662.662 0 0 1-.658.667.662.662 0 0 1-.658-.667v-1.518a1.333 1.333 0 0 1-.658-1.149zM5.204 4.5c0-1.565 1.252-2.833 2.796-2.833 1.544 0 2.796 1.268 2.796 2.833V6a.331.331 0 0 1-.329.333H5.533A.331.331 0 0 1 5.203 6V4.5z" fill-rule="nonzero"></path>
                    </svg>
                </div>
                <input type="text" class="moka-tests-input" id="password" value="{{ request()->input('password') }}" placeholder="Şifre">
            </div>
            <div class="moka-tests-input-container">
                <div class="moka-tests-input-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none" >
                            <path d="M0 0h24v24H0z"/>
                            <path d="M11.928 8.012a2.009 2.009 0 0 0 2.012-1.994 2.009 2.009 0 0 0-2.012-1.994 2.009 2.009 0 0 0-2.012 1.994c0 1.097.906 1.994 2.012 1.994zm0 1.994A2.009 2.009 0 0 0 9.916 12c0 1.097.906 1.994 2.012 1.994A2.009 2.009 0 0 0 13.94 12a2.009 2.009 0 0 0-2.012-1.994zm0 5.982a2.009 2.009 0 0 0-2.012 1.994c0 1.097.906 1.994 2.012 1.994a2.009 2.009 0 0 0 2.012-1.994 2.009 2.009 0 0 0-2.012-1.994z" fill="#AFAFAF" fill-rule="nonzero"/>
                        </g>
                    </svg>
                </div>
                <select class="moka-tests-input" id="service">
                    <option value="payment" selected>3D Secure Olmadan Ödeme</option>
                    <option value="bin-number">BIN Sorgulama</option>
                    <option value="installment-info">Taksit Tablosu Listeleme</option>
                </select>
            </div>
        </div>
        <button class="moka-tests-btn">Devam Et</button>
        <div class="moka-tests-footer">
            <p>Version: 1.0.0 <br /> Last Updated: 22 May 2023</p>
            <img src="/assets/images/optimist-hub-logo.png" class="moka-tests-footer-logo">
            <p>Powered by Moka Development by Optimist Hub</p>
        </div>
    </div>

    <script src="/assets/js/highlight.min.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/moka-tests.js"></script>
</body>
</html>