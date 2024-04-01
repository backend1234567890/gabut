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

export function setData (newData) {
    data = newData;
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "connect.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            } else {
                console.error("Error posting data: " + xhr.status);
            }
        }
    };
    let jsonData = JSON.stringify({data}); // Send just the 'number' property
    xhr.send(jsonData);
}