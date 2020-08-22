<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <h2>Orders</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
      <th>Order Id</th>
      <th>Meal ID</th>
      <th>Quantity</th>
      <th>Price Each</th>
      <th>Subtotal</th>
      <th>Created At</th>
    </tr>
    <xsl:for-each select="root/order">
    <tr>
      <xsl:variable name="quantity" select="quantity"/>
      <xsl:variable name="price_each" select="price_each"/>

      <td><xsl:value-of select="order_id" /></td>
      <td><xsl:value-of select="meal_id" /></td>
      <td><xsl:value-of select="quantity" /></td>
      <td><xsl:value-of select="price_each" /></td>
      <td><xsl:value-of select="$quantity * $price_each" /></td>
      <td><xsl:value-of select="created_at" /></td>
    </tr>
    </xsl:for-each>
  </table>
</xsl:template>

</xsl:stylesheet>