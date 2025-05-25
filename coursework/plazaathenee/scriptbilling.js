// Initialize Invoice Counter
let invoiceCounter = 1;

document.getElementById("generateBill").addEventListener("click", () => {
    //get customer name
    const customerName = document.getElementById("txtrcustName").value.trim(); 
    //get room type
    const roomType = parseFloat(document.getElementById("roomtype").value);
    //get number of nights
    const numberOfNights = parseInt(document.getElementById("txtnoOfnight").value);
    //get discount
    const discount = parseFloat(document.getElementById("txtdiscount").value) || 0;
    //get tax
    const tax = parseFloat(document.getElementById("txttax").value) || 0;

    // Validate Number of Nights
    if (isNaN(numberOfNights) || numberOfNights <= 0) {
        alert("Please enter a valid number of nights.");
        return;
    }

    // Validate Customer Name
    if (!customerName) {
        alert("Customer name cannot be empty.");
        return;
    }

    //calculate room cost
    const roomCost = roomType * numberOfNights;

    // Calculate Service Costs
    let serviceCost = 0;
    const services = [];
    document.querySelectorAll("input[type=checkbox]:checked").forEach((service) => {
        serviceCost += parseFloat(service.value); //add service cost
        services.push(service.id.charAt(0).toUpperCase() + service.id.slice(1));
    });

    const subtotal = roomCost + serviceCost;
    const taxAmount = (tax / 100) * subtotal;
    const discountAmount = (discount / 100) * subtotal;
    const totalAmount = subtotal + taxAmount - discountAmount;

    // Populate Invoice
    //set invoice number
    document.getElementById("invoiceNo").textContent = invoiceCounter.toString().padStart(5, '0');
    //increment invoice number
    invoiceCounter++;
    //set invoice date
    document.getElementById("invoiceDate").textContent = new Date().toLocaleDateString();
    //set customer name
    document.getElementById("customer").textContent = customerName; 
    //set room details
    document.getElementById("roomDetails").textContent = `Room Cost: (${numberOfNights} nights / $${roomType} per night): $${roomCost.toFixed(2)}`;
    //set services
    document.getElementById("services").textContent = services.length > 0 ? services.join(", ") : "None";
    //set subtotal
    document.getElementById("subtotal").textContent = `$${subtotal.toFixed(2)}`;
    //set dax
    document.getElementById("taxAmount").textContent = `$${taxAmount.toFixed(2)}`;
    //set discount
    document.getElementById("discountAmount").textContent = `-$${discountAmount.toFixed(2)}`;
    //set total
    document.getElementById("totalAmount").textContent = `$${totalAmount.toFixed(2)}`;
    //display invoice
    document.getElementById("invoice").style.display = "block";
});

// Print Invoice
document.getElementById("printBill").addEventListener("click", () => {
    window.print();
});
