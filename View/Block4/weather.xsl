<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0" >
	<xsl:output method="xml" version="1.0" omit-xml-declaration="yes" indent="yes" media-type="text/html"/>
	<xsl:template match="/rss/channel">
		<xsl:element name="h1">
			<xsl:value-of select="title"/>
		</xsl:element>
		<xsl:element name="h6">
			<xsl:text>Link: </xsl:text>
			<xsl:value-of select="link"/>
		</xsl:element>
		<xsl:element name="h4">
			<xsl:value-of select="description"/>
		</xsl:element>
		<xsl:for-each select="./item">
			<xsl:element name="h1">
				<xsl:value-of select="title"/>
			</xsl:element>
			<xsl:element name="p">
				<xsl:value-of select="description"/>
			</xsl:element>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>

<!-- <?xml version="1.0" encoding="UTF-8"?>
<rss xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:georss="http://www.georss.org/georss" version="2.0">
  <channel>
    <title>BBC Weather - Observations for  Manchester, GB</title>
    <link>https://www.bbc.co.uk/weather/2643123</link>
    <description>Latest observations for Manchester from BBC Weather, including weather, temperature and wind information</description>
    <language>en</language>
    <copyright>Copyright: (C) British Broadcasting Corporation, see http://www.bbc.co.uk/terms/additional_rss.shtml for more details</copyright>
    <pubDate>Tue, 15 Dec 2020 01:00:00 GMT</pubDate>
    <dc:date>2020-12-15T01:00:00Z</dc:date>
    <dc:language>en</dc:language>
    <dc:rights>Copyright: (C) British Broadcasting Corporation, see http://www.bbc.co.uk/terms/additional_rss.shtml for more details</dc:rights>
    <atom:link href="https://weather-service-thunder-broker.api.bbci.co.uk/en/observation/rss/2643123" type="application/rss+xml" rel="self" />
    <item>
      <title>Tuesday - 01:00 GMT: Not available, 7Â°C (44Â°F)</title>
      <link>https://www.bbc.co.uk/weather/2643123</link>
      <description>Temperature: 7Â°C (44Â°F), Wind Direction: Southerly, Wind Speed: 6mph, Humidity: 87%, Pressure: 997mb, Steady, Visibility: </description>
      <pubDate>Tue, 15 Dec 2020 01:00:00 GMT</pubDate>
      <guid isPermaLink="false">https://www.bbc.co.uk/weather/2643123-2020-12-15T01:00:00.000Z</guid>
      <dc:date>2020-12-15T01:00:00Z</dc:date>
      <georss:point>53.4809 -2.2374</georss:point>
    </item>
  </channel>
</rss> -->
