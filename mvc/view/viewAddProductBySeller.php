<form class="classFormAddProductBySeller" method='post' action='#'>
		<table width="500px" align="center">
			<tr>
				<td width="100px"><b>ISBN</b></td>
				<td width="350px"><input type="text" name="nameInputIsbnProductPageSeller"></td>
			</tr>
			<tr>
				<td><b>Name</b></td>
				<td><input type="text" name="nameInputNameProductPageSeller"></td>
			</tr>
			<tr>
				<td><b>Price</b></td>
				<td><input type="number" name="nameInputPriceProductPageSeller"></td>
			</tr>
			<tr>
				<td><b>Category</b></td>
				<td>
					<select name="nameInputCategoryProductPageSeller">
						<option>Electronics</option>
						<option>Garments</option>
						<option>Computer</option>
						<option>Mobbbile</option>
						<option>grocery</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><b>Quantity</b></td>
				<td><input type="number" name="nameInputQuantityProductPageSeller"></td>
			</tr>
			<tr>
				<td><b>Description</b></td>
				<td><input type="text" name="nameInputDescriptionProductPageSeller"></td>
			</tr>
			<tr>
				<td><b>Image</b></td>
				<!-- <td><input type="image" name="nameInputImageProductPageSeller"></td> -->
				<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
			</tr>
			<tr>
				<td><b>Discunt</b></td>
				<td><input type="text" name="nameInputDiscuntProductPageSeller"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>