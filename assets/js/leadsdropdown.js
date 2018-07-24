function configureDropDownLists(ddl1, ddl2) {


    var FundingBundle = ["Bundle with CASA"];
    var FundingOnly = ["CASA", "TD"];
    var LendingBundle = ["Bundle with Term Loan", "Bundle with Facility"];
    var LendingOnly = ["KAB", "Facility"];
    var ValueAddedService = ["B2B Online Networking Platform", "Cash register + mPOS", "Integrated POS solution"];

    switch (ddl1.value) {
        case 'FundingBundle':
            ddl2.options.length = 0;
            for (i = 0; i < FundingBundle.length; i++) {
                createOption(ddl2, FundingBundle[i], FundingBundle[i]);
            }
            break;
        case 'FundingOnly':
            ddl2.options.length = 0;
            for (i = 0; i < FundingOnly.length; i++) {
                createOption(ddl2, FundingOnly[i], FundingOnly[i]);
            }
            break;


        case 'LendingBundle':
            ddl2.options.length = 0;
            for (i = 0; i < LendingBundle.length; i++) {
                createOption(ddl2, LendingBundle[i], LendingBundle[i]);
            }
            break;

        case 'LendingOnly':
            ddl2.options.length = 0;
            for (i = 0; i < LendingOnly.length; i++) {
                createOption(ddl2, LendingOnly[i], LendingOnly[i]);
            }
            break;

        case 'ValueAddedService':
            ddl2.options.length = 0;
            for (i = 0; i < ValueAddedService.length; i++) {
                createOption(ddl2, ValueAddedService[i], ValueAddedService[i]);
            }
            break;

        default:
            ddl2.options.length = 0;
            break;
    }


}


function createOption(ddl, text, value) {
    var opt = document.createElement('option');
    opt.value = value;
    opt.text = text;
    ddl.options.add(opt);
}

