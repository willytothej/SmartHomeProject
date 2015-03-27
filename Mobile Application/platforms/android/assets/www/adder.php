<div id="POItablediv">
    <input type="button" id="addPOIbutton" value="Add POIs"/><br/><br/>
    <table id="POITable" border="1">
        <tr>
            <td>POI</td>
            <td>Latitude</td>
            <td>Longitude</td>
            <td>Delete?</td>
            <td>Add Rows?</td>
        </tr>
        <tr>
            <td>1</td>
            <td><input size=25 type="text" id="latbox" readonly=true/></td>
            <td><input size=25 type="text" id="lngbox" readonly=true/></td>
            <td><input type="button" id="delPOIbutton" value="Delete" onclick="deleteRow(this)"/></td>
            <td><input type="button" id="addmorePOIbutton" value="Add More POIs" onclick="insRow()"/></td>
        </tr>
    </table>
</div>