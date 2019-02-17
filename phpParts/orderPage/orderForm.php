?>

<!--   TESTING OBJECT POPLUATION ONLY -->
<?php

    print("<br>Booking"); 
    print("<br>" . $orderBooking->getBookingId());
    print("<br>" . $orderBooking->getBookingDate());
    print("<br>" . $orderBooking->getBookingNo()); 
    print("<br>" . $orderBooking->getTravelerCount());  
    print("<br>" . $orderBooking->getCustomerId());
    print("<br>" . $orderBooking->getTripTypeId());
    print("<br>" . $orderBooking->getPackageId());

    print("<br>Booking Detail");
    print("<br>" . $orderBookingDetail->getBookingDetailId());
    print("<br>" . $orderBookingDetail->getItineraryNo());
    print("<br>" . $orderBookingDetail->getTripStart());
    print("<br>" . $orderBookingDetail->getTripEnd());
    print("<br>" . $orderBookingDetail->getDescription());
    print("<br>" . $orderBookingDetail->getDestination());
    print("<br>" . $orderBookingDetail->getBasePrice());
    print("<br>" . $orderBookingDetail->getAgencyCommission());
    print("<br>" . $orderBookingDetail->getBookingId());
    print("<br>" . $orderBookingDetail->getRegionIdIndex());
    print("<br>" . $orderBookingDetail->getClassIdIndex());
    print("<br>" . $orderBookingDetail->getFeeIdIndex());
    print("<br>" . $orderBookingDetail->getProductSupplier());

    if(isset($_POST["submit"])){
        
        print("<br>Credit Card");
        // print("<br>" . $creditCard->getCreditCardId();  
        print("<br>" . $creditCard->getCCName());      
        print("<br>" . $creditCard->getCCNumber());        
        print("<br>" . $creditCard->getCCExpiry());          
        print("<br>" . $creditCard->getCustomerId());   
    }


?>



<form method="post" action="#" style="background-color: white">
    <!-- Input Boxes, required for submission -->
    <div id="txtTravelerCount" class="descToCntrl">
        <label class="label">Traveler Count </label><input type="text" name="txtTravelerCount" id="txtTravelerCount" class="input-box" required>
    </div>

    <div id="txtTravelTypeIdDesc" class="descToCntrl">
        <label class="label">Type Type</label>
        <select name="txtTravelTypeId" id="txtTravelTypeId" class="input-box">
            <option value="B">BusinessAB</option>
            <option value="L">Leisure</option>
            <option value="G">Group</option>
        </select>
    </div>

    <div id="txtCCNameDesc" class="descToCntrl">
        <label class="label">CC Type: </label>
        <select name="txtCCName" id="txtCCNameId" class="input-box">
            <option value="B">VISA</option>
            <option value="L">AMEX</option>
            <option value="G">MC</option>
        </select>
    </div>
        
    <div id="txtCCNumber" class="descToCntrl">
        <label class="label">CC Number: </label><input type="text" name="txtCCNumber" id="txtCCNumber" class="input-box" required>
    </div>

    <div id="txtCCExpiry" class="descToCntrl">
        <label class="label">CC Expiry: </label><input type="text" name="txtCCExpiry" id="txtCustCCExpiry" class="input-box" required>
    </div>

    <div id="txtOrderButtonDesc" class="descToCntrl">
        <input type="submit" name="submit" value="Submit">
    </div>

</form>
<?php