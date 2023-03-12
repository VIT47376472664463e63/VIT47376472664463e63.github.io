function doPost(e) {
    var sheet = SpreadsheetApp.openById('AKfycbxPqNRFX7slwEZpPg5z9VY1VBMHRIl7chYYlvcg606NnoJBhUxfsV5mBbfz1NBEyuZC').getSheetByName('Sheet1');
    var newRow = sheet.getLastRow() + 1;
    var rowData = [];
    rowData[0] = new Date();
    rowData[1] = e.parameter.Name;
    rowData[2] = e.parameter.Email;
    rowData[3] = e.parameter.Phone;
    rowData[4] = e.parameter.Gender;
    sheet.getRange(newRow, 1, 1, rowData.length).setValues([rowData]);
    return ContentService.createTextOutput("Success");
  }
