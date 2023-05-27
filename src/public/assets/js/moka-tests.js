$(function () {
    $(".moka-tests-btn").on("click", function () {
        const dealerCode = $("#dealer-code").val();
        const username = $("#username").val();
        const password = $("#password").val();
        const service = $("#service").val();

        $(".moka-tests-loading, .moka-tests-response, .moka-tests-messages").detach();

        $(".moka-tests-btn").after(`<div class="moka-tests-loading">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40">
                <circle cx="20" cy="20" r="15" stroke="#164194" fill="none" stroke-width="4" stroke-dasharray="90 60">
                <animateTransform attributeName="transform" attributeType="XML" type="rotate" from="0 20 20" to="360 20 20" dur="1s" repeatCount="indefinite" />
                </circle>
            </svg>
        </div>`);

        $.ajax({
            method: "POST",
            url: "/api-tests",
            data: {
                dealer_code: dealerCode,
                username: username,
                password: password,
                service: service,
            },
        }).done(function (data) {
            $(".moka-tests-btn").after(`<div class="moka-tests-card moka-tests-response"></div>`);          

            if (data.request) {
                $(".moka-tests-response").append(`<div class="moka-tests-label">Request</div><pre><code>${JSON.stringify(data?.request)}</code></pre>`);
            }
            
            if (data.response) {
                $(".moka-tests-response").append(`<div class="moka-tests-label">Response</div><pre><code>${JSON.stringify(data?.response)}</code></pre>`);
            }

            if (data.result_code) {
                $(".moka-tests-response").append(`<div class="moka-tests-label">Result Code</div><pre><code>${JSON.stringify(data?.result_code)}</code></pre>`);
            }
            
            if (data.result_message) {
                $(".moka-tests-response").append(`<div class="moka-tests-label">Result Message</div><pre><code>${JSON.stringify(data?.result_message)}</code></pre>`);
            }

            if (data.documentation_link) {
                $(".moka-tests-response").append(`<div class="moka-tests-label" style="margin-bottom: 16px">Doküman: <a href="${data?.documentation_link}" target="_blank">${data?.documentation_link}</a></div>`);
            }

            hljs.highlightAll();
        })
        .fail(function (data) {
            $(".moka-tests-btn").after(`<div class="moka-tests-card moka-tests-messages">
                <div class="moka-tests-label moka-tests-label--error">
                    ${Object.values(data?.responseJSON).join('<br>')}
                </div>
            </div>`);
        }).always(() => {
            $(".moka-tests-loading").remove();
        });
    });
});
