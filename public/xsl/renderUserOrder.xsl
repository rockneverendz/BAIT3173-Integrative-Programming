<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <h2>Orders</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
      <th>Id</th>
      <th>Status</th>
      <th>Payment Amount</th>
      <th>Created At</th>
    </tr>
    <xsl:for-each select="root/order">
    <tr>
      <td><xsl:value-of select="id" /></td>
      <td><xsl:value-of select="status" /></td>
      <td><xsl:value-of select="payment_amount" /></td>
      <td><xsl:value-of select="created_at" /></td>
    </tr>
    </xsl:for-each>
    <tr>
      <td></td>
      <td>Total</td>
      <td><xsl:value-of select="sum(//payment_amount)"/></td>
      <td></td>
    </tr>
  </table>
</xsl:template>

</xsl:stylesheet>