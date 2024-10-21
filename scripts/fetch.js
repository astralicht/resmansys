function sendRequest(
    endpoint = undefined,
    method = undefined,
    headers = undefined,
    body = undefined,
    callback = null)
{
    fetch(endpoint, {
        "method": method,
        "headers": headers,
        "body": body,
    }).then(response => response.text()).then(text => {
        try {
            obj = JSON.parse(text)
        } catch {
            console.error("JSON is invalid. Contact web admin for more details.")
            console.error("Error: " + text)
            return
        }

        if (callback == null) {
            console.error("Callback missing from fetch request. Contact web admin for more details.")
            return
        }

        callback(obj)
    })
}