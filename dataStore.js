let data = {
    number: 0
}

export function getData () {
    return fetch('getData.php')
        .then(response => response.json())
        .then(jsonData => {
            // Update the 'data' object with the retrieved data
            return jsonData;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

export function setData(newData) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "connect.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                try {
                    let response = JSON.parse(xhr.responseText);
                    console.log("Received data:", response);
                } catch (error) {
                    console.error("Error parsing JSON:", error);
                }
            } else {
                console.error("Error posting data: " + xhr.status);
            }
        }
    };
    let jsonData = JSON.stringify({ data: newData }); // Send just the 'data' property
    xhr.send("data=" + encodeURIComponent(jsonData)); // Send data in the request body
}
